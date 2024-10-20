<?php
namespace App\Traits;

trait ApiResponse
{
    protected function apiResponse($success, $message, $data = null, $statusCode = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    protected function successResponse( $data = null , $message, $statusCode = 200)
    {
        return $this->apiResponse(true, $message, $data, $statusCode);
    }

    protected function errorResponse($message, $statusCode = 400)
    {
        return $this->apiResponse(false, $message, null, $statusCode);
    }

    protected function notfoundResponse($message){
        return response()->json([
            'status' => false,
            'message' => $message,
            'code' => 404
        ]);
    }



    //////////////////   AUTH     ///////////////////////////
    protected function loginResponse($data, $token)
    {

        return response()->json([
            'status' => true,
            'message' => 'Login Successfully',
            'data' => $data,
            'token' => $token,
            'code' => 200
        ]);
    }

    protected function registerResponse($data)
    {
        return response()->json([
            'status'=>true,
            'message' => 'register successfully',
            'data' => $data,
            'code' => 201

        ]);
    }

    protected function logoutResponse($message)
    {
        return $this->successResponse($message,['code'=>204]);
    }



    protected function indexResponse($data)
    {
        return response()->json([
            'status'=>true,
            'message' => 'return successfully',
            'data' => $data,
            'code' => 200

        ]);
    }

    protected function storeResponse($data)
    {
        return response()->json([
            'status'=>true,
            'message' => 'Create successfully',
            'data' => $data,
            'code' => 201

        ]);
    }

    protected function showResponse($data)
    {
        return response()->json([
            'status'=>true,
            'message' => 'return successfully',
            'data' => $data,
            'code' => 200

        ]);
    }

    protected function updateResponse($data)
    {
        return response()->json([
            'status'=>true,
            'message' => 'Update successfully',
            'data' => $data,
            'code' => 201

        ]);
    }

    public function destroyResponse($message ='Delete  successfully' ){
        return response()->json([
            'status'=>true,
            'message' => $message  ,
            'code' => 204

        ]);
    }

    // **********************************************************
    // ********************************************************
    // ******************Notification**************************
    // ********************************************************
    // ********************************************************
    protected function NotificationResponse($data)
    {
        return response()->json([
            'status'=>true,
            'message' => 'Create Successfully Notification and Send Notification To All User ',
            'data' => $data,
            'code' => 201

        ]);
    }


}
