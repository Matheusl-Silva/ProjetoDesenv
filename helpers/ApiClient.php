<?php
/**
 * Cliente HTTP centralizado para chamadas à API Node.
 * Sempre injeta o header Authorization: Bearer <token> se houver token na sessão.
 * Em caso de 401 (token expirado/ausente), redireciona pro /login.
 */
class ApiClient
{
    private static function buildHeaders($extra = [])
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $headers = ["Content-Type: application/json"];
        if (!empty($_SESSION['token'])) {
            $headers[] = "Authorization: Bearer " . $_SESSION['token'];
        }
        foreach ($extra as $h) {
            $headers[] = $h;
        }
        return $headers;
    }

    private static function request($method, $path, $data = null, $opts = [])
    {
        $url = (defined('API_BASE_URL') ? API_BASE_URL : 'http://backend:3000') . $path;

        $headers = self::buildHeaders($opts['headers'] ?? []);
        $http    = [
            "method"        => strtoupper($method),
            "header"        => implode("\r\n", $headers),
            "ignore_errors" => true, // pega corpo mesmo em 4xx/5xx
        ];
        if ($data !== null) {
            $http["content"] = is_string($data) ? $data : json_encode($data);
        }

        $context = stream_context_create(["http" => $http]);
        $body    = @file_get_contents($url, false, $context);
        $status  = self::parseStatus($http_response_header ?? []);

        // Token expirado/ausente em rota protegida -> manda pro login
        if ($status === 401 && empty($opts['no_redirect_on_401'])) {
            $_SESSION = [];
            session_destroy();
            header("Location: /login");
            exit;
        }

        return [
            "status" => $status,
            "body"   => $body,
            "json"   => $body === false ? null : json_decode($body, true),
        ];
    }

    private static function parseStatus($headers)
    {
        foreach ($headers as $h) {
            if (preg_match('#^HTTP/\S+\s+(\d+)#', $h, $m)) {
                return (int) $m[1];
            }
        }
        return 0;
    }

    public static function get($path, $opts = [])
    {
        return self::request("GET", $path, null, $opts);
    }

    public static function post($path, $data, $opts = [])
    {
        return self::request("POST", $path, $data, $opts);
    }

    public static function put($path, $data, $opts = [])
    {
        return self::request("PUT", $path, $data, $opts);
    }

    public static function delete($path, $opts = [])
    {
        return self::request("DELETE", $path, null, $opts);
    }
}
