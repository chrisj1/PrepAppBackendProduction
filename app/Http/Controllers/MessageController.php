<?php
/**
 * Created by PhpStorm.
 * User: chrisjerrett
 * Date: 11/8/16
 * Time: 1:09 PM
 */

namespace App\Http\Controllers;

use App\User;
use App\MyClass;
use App\Message;
use App\Teacher;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//$this->middleware('auth');
	}

	public function getClassesFromTeacherId($teacher) {
		return MyClass::all()->where('teacher_id', $teacher)->getDictionary();
	}

	public function getTeachers() {
		return Teacher::all();
	}

	public function getMessagesFromClass($class) {
		return Message::all()->where('class_id', $class);
	}

	public function getSubjects() {
		return Subject::all();
	}

	public function getClassesFromSubject($subject) {
		return MyClass::all()->where('subject', $subject);
	}

	public function getEnrolledClasses($user) {
		return DB::table('user_classes')->where('user_id', $user)->get();
	}

	public function enrollInClass(User $user, MyClass $class) {
		$data = [
			'class_id' => $class->id,
			'user_id' => $user->id
		];

		DB::table('user_classes')->insert($data);
	}

	public function addMessage(MyClass $class, User $user, Request $request) {
		$messageText = $request->text;
		$message = new Message();
		$message->class_id = $class->id;
		$message->user_id = $user->id;
		$message->text = $messageText;
		$message->save();
	}

	public function getClasses() {
		return MyClass::all();
	}

	public function login(Request $request) {
                $email =  $request->input('email');
                $password = $request->input('password');
                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                        return Auth::user();
                }
                 return response(203);
        }
}
