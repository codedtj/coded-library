<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Controllers\Library;


use App\Http\Controllers\Controller;
use App\Models\Resource;
use Inertia\Inertia;
use Inertia\Response;

class StatisticResourceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Response
    {
            $recources_count = Resource::all()->count();
            $fiction_count  = Resource::all()->where('type', 'Китобҳои бадеӣ')->count();
            $textbooks_count = Resource::all()->where('type', 'Китобҳои дарсӣ')->count();
            $video_lessons_count = Resource::all()->where('type', 'Дарсҳои видеоӣ')->count();
            $practical_virtual_lessons_count = Resource::all()->where('type', 'Дарсҳои амалии виртуалӣ')->count();
            $interactive_books_count = Resource::all()->where('type', 'Китобҳои интерактивӣ')->count();
            $demonstrations_count = Resource::all()->where('type', 'Намоишномаҳо')->count();
            $industry_materials_count = Resource::all()->where('type', 'Маводҳои соҳавӣ')->count();
            $additional_course_materials_count = Resource::all()->where('type', 'Маводҳои дарсҳои иловагӣ')->count();
            $teacher_training_materials_count = Resource::all()->where('type', 'Маводҳои такмили ихтисоси омӯзгорон')->count();

            return Inertia::render('Statistic/Index', compact([
                'recources_count',
                'fiction_count',
                'textbooks_count',
                'video_lessons_count',
                'practical_virtual_lessons_count',
                'interactive_books_count',
                'demonstrations_count',
                'industry_materials_count',
                'additional_course_materials_count',
                'teacher_training_materials_count'

            ]));


    }

}
