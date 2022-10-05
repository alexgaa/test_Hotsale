<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\CheckUserEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private const RULES_FOR_VALIDATION = [
        'name' => 'required|max:255|min:2',
        'last_name' => 'required|max:255|min:2',
        'email' => 'required|email',
        'password'=>'required|confirmed'
    ];

    private const USER_DATA_VALID = [
        [   'name' => 'Alex',
            'id'=> 1,
            'email' => 'alex@alex.com'
        ],
        [   'name' => 'Dimon',
            'id'=> 2,
            'email' => 'dimon@dimon.com'
        ],
        [   'name' => 'Mari',
            'id'=> 1,
            'email' => 'mari@mari.com'
        ],
        [   'name' => 'Den',
            'id'=> 2,
            'email' => 'den@den.com'
        ]
    ];

    /** @var CheckUserEmail  */
    private $checkUserEmail;

    public function __construct()
    {
        $this->checkUserEmail = new CheckUserEmail();
    }

    /**
     * Application|Factory|View
     */
    public function index()
    {
        return view('create');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(self::RULES_FOR_VALIDATION);
        $logStatus = $this->checkUserEmail->check($request->email, self::USER_DATA_VALID, 'email');
        $resultInHtml = view('main')->render();

        return response()->json(compact('resultInHtml', 'logStatus'));
    }
}
