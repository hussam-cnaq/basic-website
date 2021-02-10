<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function findCourseCredit($code){
        $credits = ["CP3445" => 4,
                    "CP4480" => 3];
        if (!array_key_exists($code, $credits)) {
            abort(404);
        }
        return view('course', ["courseCode" => $code, "courseCredit" => $credits[$code]]);
    }
}
