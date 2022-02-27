<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>.
 * @organization Space Platform
 * @project composer
 * @create Created on 2020/9/20 下午4:46
 * @namespace ${NAMESPACE}
 */

declare(strict_types=1);

namespace Nashgao\Pelias;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Promise;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Guzzle\PoolHandler;
use Hyperf\Guzzle\RetryMiddleware;
use Hyperf\Utils\Coroutine;
use Nashgao\Pelias\Attribute\ArrayLikeInterface;
use Nashgao\Pelias\Attribute\NestedInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

/**
 * @method ResponseInterface get(string|UriInterface $uri, array $options = [])
 * @method ResponseInterface head(string|UriInterface $uri, array $options = [])
 * @method ResponseInterface put(string|UriInterface $uri, array $options = [])
 * @method ResponseInterface post(string|UriInterface $uri, array $options = [])
 * @method ResponseInterface patch(string|UriInterface $uri, array $options = [])
 * @method ResponseInterface delete(string|UriInterface $uri, array $options = [])
 * @method Promise\PromiseInterface getAsync(string|UriInterface $uri, array $options = [])
 * @method Promise\PromiseInterface headAsync(string|UriInterface $uri, array $options = [])
 * @method Promise\PromiseInterface putAsync(string|UriInterface $uri, array $options = [])
 * @method Promise\PromiseInterface postAsync(string|UriInterface $uri, array $options = [])
 * @method Promise\PromiseInterface patchAsync(string|UriInterface $uri, array $options = [])
 * @method Promise\PromiseInterface deleteAsync(string|UriInterface $uri, array $options = [])
 */
abstract class Client
{
    protected GuzzleClient $client;

    protected ConfigInterface $config;

    protected string $connection;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    public function buildWith(string $serviceType): static
    {
        $configEndPoint = 'pelias.api.' . $this->connection ?? 'search';
        if (Coroutine::inCoroutine()) {
            $handler = make(PoolHandler::class, [
                'option' => [
                    'max_connections' => $this->config->get("{$configEndPoint}.max_connections"),
                ],
            ]);
        }

        // default retry
        $stack = HandlerStack::create($handler ?? null);
        $stack->push(make(
            RetryMiddleware::class,
            [
                'retries' => $this->config->get("{$configEndPoint}.retry"),
                'delay' => $this->config->get("{$configEndPoint}.delay"),
            ]
        )->getMiddleware(), 'retry');

        $this->client = make(GuzzleClient::class, [
            'config' => [
                'base_uri' => $this->config->get("{$configEndPoint}.endpoint"),
                'handler' => $stack,
            ],
        ]);

        setPelias(new $serviceType());
        return $this;
    }

    public function query(): ResponseInterface
    {
        $query = getPelias()->toArray();

        foreach ($query as $key => &$value) {
            if ($value instanceof NestedInterface) {
                $attributes = get_object_vars($value);
                foreach ($attributes as $attribute => $val) {
                    $query["{$key}.{$attribute}"] = $val;
                }
                unset($query[$key]);
            }

            if ($value instanceof ArrayLikeInterface) {
                $query[$key] = (function () use ($value) {
                    foreach ($value as $sourceName => $sourceValue) {
                        if ($sourceValue) {
                            if (! isset($soureQuery)) {
                                $sourceQuery = $sourceName;
                            } else {
                                $sourceQuery = ",{$sourceName}";
                            }
                        }
                    }
                    return $sourceQuery ?? '';
                })();
            }
        }

        return $this->client->get('/v1/' . $this->connection, [
            'query' => $query,
        ]);
    }

    public function where(string $field, $value): static
    {
        $parameter = getPelias();
        setPelias($parameter->set($field, $value));
        return $this;
    }
}
