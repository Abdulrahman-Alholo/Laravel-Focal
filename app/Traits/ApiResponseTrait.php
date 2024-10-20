<?
namespace App\Traits;

trait ApiResponseTrait
{
    public function successResponse($data = null,$message = "success",int $code = 200)  {
        return response()->json(
            [
                'data' => $data,
                'message' => $message
            ],$code
        );
    }

    protected function errorResponse($message = "faild",int $code = 400)  {
        return response()->json(
            [
                'message' => $message
            ],$code
        );
    }
}
