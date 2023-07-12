<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;


class StudentController extends Controller{
    public function index(){
            $students = student::paginate(7);
            return view('students.index', compact('students'));
        }
    

    
        public function create(){
            $courses = Course::all();
            return view('students.create', compact('courses'));
    
    
        }
        public function show($id){
            $student = Student::findOrFail($id);
            return view('students.show', ['student' => $student]);
        }
    

        
public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:students',
        'phone' => 'required|unique:students,phone',
        'gender' => 'required',
        'course_id' => 'required',

    ]);

    $student = new Student();
    $student->name = $validatedData['name'];
    $student->email = $validatedData['email'];
    $student->phone = $validatedData['phone'];
    $student->gender = $validatedData['gender'];
    $student->course_id = $request['course_id'];
    $student->save();

    return redirect()->route('students.index')->with('success', 'Etudiant créé avec succés');
}

public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);


    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'phone' => 'required|unique:students,phone,'. $student->id,
        'gender' => 'required',
        'course_id' => 'required',
    ]);

    $student->name = $validatedData['name'];
    $student->email = $validatedData['email'];
    $student->phone = $validatedData['phone'];
    $student->gender = $validatedData['gender'];
    $student->course_id = $validatedData['course_id'];
    $student->save();

    return redirect()->route('students.index')->with('success', 'Étudiant Modifier avec succès');
}

    
        public function edit($id){
            $student = Student::find($id);
            $email= $student->email;
            $gender= $student->gender;
            $phone= $student->phone;
            $courses = Course::all();
            return view('students.edit', compact('student','courses','email','gender','phone'));
        }



        public function destroy($id){
            $student = Student::find($id);
            $student->delete();
            return redirect('/students')->with('success', 'Étudiant a été supprimé avec succès');
  
        }

        public function search(Request $request)
        {
            if ($request->ajax()) {
                $name = $request->name;
                $query = Student::query();
                if (!empty($name)) {

                    $query->where('name', 'like', '%' . $name . '%')->orWhere('id', '='  , $name  )->orWhere('phone', 'like', '%' . $name . '%'  )->orWhere('email',  'like', '%' . $name . '%' )->orWhere('gender', '='  , $name  );

                    $query->orWhereHas('course', function ($q) use ($name) {

                        $q->where('name', 'like', '%' . $name . '%');
                    });
                }
                $students = $query->get();
                $output = '';
                if ($students->count() > 0) {
                    foreach ($students as $student) {
                        $output .= '<tr>
                                      <td>'.$student->name.'</td>
                                      <td>'.$student->email.'</td>
                                      <td>'.$student->course->name .'</td>
                                      
                                      <td>'.$student->gender.'</td>
                                      <td>
                                        <a class="btn btn-primary" href="'.route('students.show',  $student->id).'">Détails</a>
                                        <a class="btn btn-primary" href="'.route('students.edit', $student->id).'">Modifier</a>
                                        <form action="'.route('students.destroy', $student->id).'" method="post" style="display:inline-block;">
                                          '.csrf_field().'
                                          '.method_field("DELETE").'
                                          <button class="btn btn-danger" onclick="return confirm(\'Voulez-vous vraiment supprimer ce cours ?\')">Supprimer</button>
                                        </form>
                                      </td>
                                    </tr>';
                    }
                } else {
                    $output .= '<tr><td colspan="2">Aucuns étudiants trouvés</td></tr>';
                }
                return $output;
            }
            $students = Course::paginate(7);
            return view('students.index', compact('students'));
        
        
        }
    }