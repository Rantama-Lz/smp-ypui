<!-- <?php

use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

// public function render($request, Throwable $exception)
// {
//     if ($exception instanceof ValidationException) {
//         return redirect()
//             ->back()
//             ->withInput($request->input())
//             ->withErrors($exception->errors());
//     }

//     return parent::render($request, $exception);
// }
// public function render($request, Throwable $exception)
// {
//     if ($exception instanceof QueryException) {
//         if ($exception->errorInfo[1] === '1062') { // Kode error untuk unique constraint violation
//             return response()->json([
//                 'message' => 'Duplikasi data terdeteksi. Siswa sudah terdaftar di tahun ajaran ini.',
//             ], 409); // HTTP 409 Conflict
//         }
//     }

//     return parent::render($request, $exception);
// } -->