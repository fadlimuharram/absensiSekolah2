<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Kelas;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_page = 'kelas';
        $halaman = 10;
        $kelas = Kelas::latest()->paginate($halaman);
        $req_get = request()->input('page',1);

        return view('admin.kelas', compact('kelas','current_page'))->with('i',
            ($req_get-1)*$halaman
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi'=>'required'
        ]);

        Kelas::create([
            'deskripsi'=> $request->deskripsi
        ]);
        return redirect(route('kelas.index'))->with('success','kelas berhasil di tambahkan');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Kelas::find($id)->update([
            'deskripsi'=>$request->deskripsi
        ]);

        return redirect(route('kelas.index'))->with('success','kelas berhasil di edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::find($id)->delete();

        return redirect(route('kelas.index'))->with('success','kelas berhasil di hapus');
    }

    public function kelasDataTable()
    {
      $data = Kelas::get();
              return DataTables::of($data)
                  ->addColumn('action', function ($data) {
                    $htmlModal =
                    '
                    <div class="modal fade" id="editModal'.$data->id.'" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="editModalLabel">Ubah
                                        '.$data->deskripsi.'</h4>
                                </div>
                                <form method="POST" action="'.route('kelas.update',$data->id).'">
                                    '.csrf_field().'
                                      '.method_field('PUT').'


                                    <div class="modal-body">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            name="deskripsi"
                                                            value="'. $data->deskripsi.'"
                                                            required="required"
                                                            autofocus="autofocus">
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row clearfix">

                                            <div class="col-sm-12">
                                                <div class="form-group form-float">
                                                    <button type="submit" class="btn btn-link waves-effect">
                                                        Ubah
                                                    </button>
                                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                    ';

                    $htmlEdit =
                        '
                        <button
                            type="button"
                            class="btn btn-xs btn-primary"
                            data-toggle="modal"
                            data-target="#editModal'.$data->id.'"><i class="glyphicon glyphicon-edit"></i></button>
                        ';

                      $htmlForm =
                          '<form action="' .
                          route('kelas.destroy', $data->id) .
                          '" method="POST" id="hapusKelas' .
                          $data->id .
                          '">
                          ' .
                          $htmlEdit
                          .'
                          ' .
                          csrf_field() .
                          '
                          ' .
                          method_field('DELETE') .
                          '
                          <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>


                      </form>
                      '.$htmlModal.'

                      ';


                      return $htmlForm;
                  })
                  ->make(true);
    }
}
