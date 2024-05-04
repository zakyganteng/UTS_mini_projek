<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pageTitle = 'Employee List';
        // return view('employee.index', ['pageTitle' => $pageTitle]);
        $pageTitle = 'Barang List';

        // RAW SQL QUERY
        $Barang = DB::select('
SELECT *, Barang.id AS Barang_id, satuans.nama_satuan AS satuan_name
    FROM Barang
    LEFT JOIN satuans ON Barang.position_id = satuans.id
');


        return view('Barang.index', [
            'pageTitle' => $pageTitle,
            'Barang' => $Barang
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Barang';
        // RAW SQL Query
        $satuans = DB::select('select * from satuans');

        return view('Barang.create', compact('pageTitle', 'satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $messages = [
        'required' => ':Attribute harus diisi.',
        'numeric' => ':Attribute harus berupa angka.'
    ];

    $validator = Validator::make($request->all(), [
        'KodeBarang' => 'required',
        'NamaBarang' => 'required',
        'Qty' => 'required|numeric', // Menggunakan aturan numeric untuk Qty
        'Harga' => 'required|numeric',
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Simpan data ke dalam tabel 'Barang'
    DB::table('barang')->insert([
        'kodeBarang' => $request->KodeBarang,
        'NamaBarang' => $request->NamaBarang,
        'Qty' => $request->Qty,
        'Harga' => $request->Harga,
        'position_id' => $request->position
        // Pastikan field 'position_id' sesuai dengan struktur tabel Barang
    ]);

    return redirect()->route('Barang.index');
    // dd($request->all())
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Barang Detail';

        // RAW SQL QUERY
        $Barang = collect(DB::select('
        select *, Barang.id as Barang_id, satuans.nama_satuan AS satuan_name
        from Barang
        left join satuans ON Barang.position_id = satuans.id
        where Barang.id = ?
    ', [$id]))->first();

        return view('Barang.show', compact('pageTitle', 'Barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Barang Detail';

        // Mengambil data Barang berdasarkan ID
        $Barang = collect(DB::select('
        select *, Barang.id as Barang_id, satuans.nama_satuan AS satuan_name
        from Barang
        left join satuans ON Barang.position_id = satuans.id
        where Barang.id = ?
    ', [$id]))->first();

        // Mengambil semua data posisi
        $positions = DB::table('satuans')->get();

        return view('Barang.edit', compact('pageTitle', 'Barang', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            // 'KodeBarang' => 'required',
            'NamaBarang' => 'required',
            'Qty' => 'required|numeric', // Menggunakan aturan numeric untuk Qty
        'Harga' => 'required|numeric',
            // Pastikan ini sesuai dengan name yang ada pada form
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mengambil data employee berdasarkan ID
        DB::table('barang')->where('id', $id)->update([
            // 'kodeBarang' => $request->KodeBarang,
            'NamaBarang' => $request->NamaBarang,
            'Qty' => $request->Qty,
            'Harga' => $request->Harga,
            'position_id' => $request->position
        ]);

        return redirect()->route('Barang.index')->with('success', 'Employee data updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // QUERY BUILDER
        DB::table('Barang')
            ->where('id', $id)
            ->delete();

        return redirect()->route('Barang.index');
    }

}
