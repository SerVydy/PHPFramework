<?php

    namespace PHPFramework;

    class Router 
    {
        protected Request $request;
        protected Response $response;

        protected array $routes = [];
        protected array $route_params = [];
        public function __construct(Request $request, Response $response)
        {
            $this->request = $request;
            $this->response = $response;
        }

        public function add($path, $callback, $method):self
        {
            $path = trim($path, '/');
            if(is_array($method)) {
                $method = array_map('strtoupper', $method);
            } else{
                $method = [strtoupper($method)];
            }
            $this->routes[] = [
                'path' => "/".$path,
                'callback' => $callback,
                'middleware' => null,
                'method' => $method,
                'needToken' => true,
            ];

            return $this;
        }

        public function get($path, $callback):self
        {
            return $this->add($path, $callback, 'get');
        }

        public function post($path, $callback):self
        {
            return $this->add($path, $callback, 'post');
        }

        public function getRoutes(): array
        {
            return $this->routes;
        }

        public function dispatch():mixed
        {
            $path = $this->request->getPath();
            $route = $this->mathRoute($path);
            if (!$route) {
                abort('Page not found');
            }
            if (is_array($route['callback'])) {
                $route['callback'][0 ] = new $route['callback'][0];
            }

            return call_user_func($route['callback']);
        }

        protected function mathRoute($path):mixed
        {
            foreach($this->routes as $route)
            {
                if (
                    preg_match("#^{$route['path']}$#", "/{$path}", $matches)
                    &&
                    in_array($this->request->getMethod(), $route['method'])
                )
                {
                    foreach ($matches as $k => $v)
                    {
                        if(is_string($k))
                        $this->route_params[$k] = $v;
                    }
                    return $route;
                }
            }
            return false;
        }
    }