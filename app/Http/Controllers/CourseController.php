<?php
namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class CourseController extends Controller{

    public function index(){
        $courses = Course::paginate(7);

        $courseCount=Course::Count();

        return view('courses.index',['courses' => $courses,'courseCount'=>$courseCount] );
    }



    public function show($id){

    $course = Course::findOrFail($id);

    $students_count = $course->students()->count();

     return view('courses.show', ['course' => $course, 'students_count' => $students_count]);

    }


    public function create(){ return view('courses.create');}


    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255|unique:course',
            'description' => 'nullable',
        
        ]);

        $existCours = Course::where('name', $request->input('name'))->first();
        if ($existCours) {
            return redirect()->back()->with('error', 'Le cours existe déjà');
        }
        $course = new Course();
        $course->name = $validated['name'];
        $course->description = $validated['description'];
   
        $course->save();
        

        return redirect()->route('courses.index')->with('success', 'cours ajouter avec succes.');
    }


    public function edit($id){
        $course = Course::findOrFail($id);
        return view('courses.edit', ['course' => $course]);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|',
        
        ]);
    $course = Course::findOrFail($id);
    $existing_course = Course::where('name', $request->name)->first();
    if ($existing_course && $existing_course->id != $course->id) {
        return back()->with('error', 'Le cours déjà existe');}

        $course = Course::findOrFail($id);
        $course->name = $validated['name'];
        $course->description = $validated['description'];
 
        $course->save();
        return redirect()->route('courses.index')->with('success', 'Course Modifier avec succés ');}


    public function destroy($id){
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course Supprimé avec succès');
    }


    public function search(Request $request)
    {
        if ($request->ajax()) {
            $name = $request->name;
            $query = Course::query();
            if (!empty($name)) {
                $query->where('name', 'like', '%' . $name . '%')->orWhere('id', '='  , $name  );
            }
            $courses = $query->get();
            $output = '';
            if ($courses->count() > 0) {
                foreach ($courses as $row) {
                    $output .= '<tr>
                                  <td>'.$row->name.'</td>
                                  <td>
                                    <a class="btn btn-primary" href="'.route('courses.show', ['id' => $row->id]).'">Détails</a>
                                    <a class="btn btn-primary" href="'.route('courses.edit', ['id' => $row->id]).'">Modifier</a>
                                    <form action="'.route('courses.destroy', $row->id).'" method="post" style="display:inline-block;">
                                      '.csrf_field().'
                                      '.method_field("DELETE").'
                                      <button class="btn btn-danger" onclick="return confirm(\'Voulez-vous vraiment supprimer ce cours ?\')">Supprimer</button>
                                    </form>
                                  </td>
                                </tr>';
                }
            } else {
                $output .= '<tr><td colspan="2">Aucun cours trouvé</td></tr>';
            }
            return $output;
        }
        $courses = Course::paginate(7);
        return view('courses.index', compact('courses'));
    }
    
    }
    

