use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Courses CRUD
Route::resource('courses', CourseController::class)->middleware('auth');

// Enrollment
Route::post('/enroll/{course}', [EnrollmentController::class, 'enroll'])->name('enroll')->middleware('auth');

// Auth routes provided by Laravel Breeze
require __DIR__.'/auth.php';