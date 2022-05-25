<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\CompetentionD;
use App\CompetentionsBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use PHPUnit\Framework\Warning;

class CompetentionsController extends Controller
{

    public function index(Request $request)
    {
        if(null !== $request->input('block')) {
            foreach($request->input('block') as $block) {
                $competentions_block[] = \App\CompetentionsBlock::where('id', $block)->first();
            }

            if(null !== $competentions_block && $competentions_block !== "") {
                foreach($competentions_block as $comp) {
                    foreach($comp->courses as $course) {
                        $courses[] = $course;
                    }

                }
            }

        }

        $competentions = CompetentionD::all();
        $competentionsBlock = CompetentionsBlock::all();

        if(isset($courses) && null !== $courses) {
            return view('competentions', ['competentions' => $competentions, 'competentionsBlock' => $competentionsBlock, 'courses'=>$courses]);

        }

        return view('competentions', ['competentions' => $competentions, 'competentionsBlock' => $competentionsBlock]);

    }

    public function resume() {
        return view('resume');
    }
    public function cyk() {
        return view('cyk');
    }

    public function addusercomp(Request $request) {
        $userId = $request->input('user_id');
        $compId = $request->input('comp');

        DB::table('user_competentions')->insert([
            'user_id' => $userId,
            'competention_d_id' => $compId
        ]);

        return true;
    }

    public function getresume(Request $request) {
        $templateProcessor = new TemplateProcessor('resume.docx');
        $templateProcessor->setValue('fio', $request->input('fio'));
        $templateProcessor->setValue('phone', $request->input('phone'));
        $templateProcessor->setValue('city', $request->input('city'));
        $templateProcessor->setValue('email', $request->input('email'));
        $templateProcessor->setValue('grazd', $request->input('grazd'));
        $templateProcessor->setValue('obr', $request->input('obr'));
        $templateProcessor->setValue('birth', $request->input('birth'));
        $templateProcessor->setValue('sem', $request->input('sem'));
        $templateProcessor->setValue('rabota_name', $request->input('rabota_name'));
        $templateProcessor->setValue('rabota_dolzn', $request->input('rabota_dolzn'));
        $templateProcessor->setValue('ucheba_name', $request->input('ucheba_name'));
        $templateProcessor->setValue('ucheba_spec', $request->input('ucheba_spec'));
        $templateProcessor->setValue('school', $request->input('school'));
        $templateProcessor->setValue('lang', $request->input('lang'));
        $templateProcessor->setValue('vod_udostov', $request->input('vod_udostov'));
        $path = Auth::id() . "_" . time() . rand(1, 999) . '.docx';
        $templateProcessor->saveAs($path);

        return response()->download(public_path($path));
    }
}
