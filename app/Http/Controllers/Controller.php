<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
  protected function success($data = [], string $message = 'Operation successful', int $status = 200): JsonResponse
  {
    return response()->json([
      'status'  => 'success',
      'message' => $message,
      'data'    => $data,
    ], $status);
  }

  protected function responsePagination($paginator, $data = [], string $message = 'Operation successful', int $status = 200): JsonResponse
  {
    if ($paginator instanceof LengthAwarePaginator) {
      $pagination = [
        'current_page' => $paginator->currentPage(),
        'total_pages'  => $paginator->lastPage(),
        'total'        => $paginator->total(),
        'per_page'     => $paginator->perPage(),
        'links'        => [
          'first' => $paginator->url(1),
          'last'  => $paginator->url($paginator->lastPage()),
          'prev'  => $paginator->previousPageUrl(),
          'next'  => $paginator->nextPageUrl(),
        ],
      ];
    } else {
      $pagination = null;
    }

    return response()->json([
      'status'     => 'success',
      'message'    => $message,
      'data'       => $data,
      'pagination' => $pagination,
    ], $status);
  }

  protected function error($data = [], string $message = 'An error occurred', int $status = 400): JsonResponse
  {
    return response()->json([
      'status'  => 'error',
      'message' => $message,
      'data'    => $data,
    ], $status);
  }
}
