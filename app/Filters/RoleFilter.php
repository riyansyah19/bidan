<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $userRole = $session->get('role');

        if (!$session->get('logged_in')) {
            return redirect()->to('/');
        }

        if ($arguments && !in_array($userRole, $arguments)) {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak anda tidak berhak!!!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
