<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            return response()->view('admin.unauthorized');
        }
        if($request->route()->getAction()["controller"] == "App\Http\Controllers\API\PassportController@getDetails"){
            return response()->json(['error'=>'Unauthorised'], 401);
        }

        $authenticatedRoutArr = [];
        $authenticatedRoutArr[0] = "App\\Http\\Controllers\\API\\UsersController@editAccount";
        $authenticatedRoutArr[1] = "App\\Http\\Controllers\\API\\statitcPagesController@insertComplaint";
        $authenticatedRoutArr[2] = "App\\Http\\Controllers\\API\\UsersController@activeAccount";
        if(in_array($request->route()->getAction()["controller"] , $authenticatedRoutArr)){
            return response()->json(['error'=>'Unauthorised'], 401);
        }
        return parent::render($request, $exception);
    }
}
