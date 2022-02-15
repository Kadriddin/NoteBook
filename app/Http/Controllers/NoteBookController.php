<?php

namespace App\Http\Controllers;

use App\NoteBook;
use Illuminate\Http\Request;

class NoteBookController extends Controller
{
    /**
     * @SWG\Get(
     *     path="/v1/notebook/",
     *     summary="Get all",
     *     tags={"Get"},
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/Post")
     *         ),
     *     ),
     *     @SWG\Response(
     *         response="401",
     *         description="Unauthorized user",
     *     ),
     * )
     */
    public function index()
    {
        return NoteBook::all();
    }
    /**
     * @SWG\Get(
     *     path="/v1/notebook/{id}",
     *     summary="Get notebook by id",
     *     tags={"Get"},
     *     description="Get notebook by id",
     *     @SWG\Parameter(
     *         name="notebook_id",
     *         in="path",
     *         description="Notebook id",
     *         type="integer",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(ref="#/definitions/Post"),
     *     ),
     *     @SWG\Response(
     *         response="401",
     *         description="Unauthorized user",
     *     ),
     *     @SWG\Response(
     *         response="404",
     *         description="Notebook is not found",
     *     )
     * )
     */

    public function show($id)
    {
        $noteBook = NoteBook::find($id);
        if (is_null($noteBook)) {
            return $this->sendError('NoteBook not found.');
        }
        return response($noteBook, 200);
    }
    /**
     * @SWG\Post(
     *     path="/v1/notebook/",
     *     summary="Post notebook",
     *     tags={"Post"},
     *     description="Insert into database",
     *     @SWG\Parameter(
     *         name="notebook",
     *         in="path",
     *         description="Notebook",
     *         type="string",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(ref="#/definitions/Post"),
     *     ),
     *     @SWG\Response(
     *         response="401",
     *         description="Unauthorized user",
     *     ),
     *     @SWG\Response(
     *         response="404",
     *         description="Notebook is not found",
     *     )
     * )
     */
    public function store(Request $request)
    {
//        $noteBook=NoteBook::create($request->all());
//        return response()->json($noteBook, 201);
        $this->validate($request, [
            'fio' => 'required',
            'telephone' => 'required',
            'email' => 'required'
        ]);
        NoteBook::create($request->all());
        return response(null, 201);
    }

    /**
     * @SWG\Put(
     *     path="/v1/notebook/{id}",
     *     summary="Update notebook",
     *     tags={"NoteBook"},
     *     description="Returns update notebook data",
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         description="Notebook id",
     *         type="string",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(ref="#/definitions/Post"),
     *     ),
     *     @SWG\Response(
     *         response="404",
     *         description="Notebook is not found",
     *     )
     * )
     */


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fio' => 'required',
            'telephone' => 'required',
            'email' => 'required'
        ]);
        $notebook = NoteBook::find($id);
        $notebook->update($request->all());
        return $notebook;
    }


    /**
     * @SWG\Delete(
     *     path="/v1/notebook/{id}",
     *     summary="Delete selecting notebook",
     *     tags={"NoteBook"},
     *     description="Delete a record and returns no content",
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         description="Notebook id",
     *         type="integer",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(ref="#/definitions/Post"),
     *     ),
     *     @SWG\Response(
     *         response="404",
     *         description="Notebook is not found",
     *     )
     * )
     */

    public function delete($id)
    {
        NoteBook::find($id)->delete();
        return response(null, 204);
    }
    /**
     * @SWG\Get(
     *     path="/v1/paginate",
     *     summary="Select by page",
     *     tags={"NoteBook"},
     *     description="Select by 1 data",
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         description="Notebook id",
     *         type="integer",
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(ref="#/definitions/Post"),
     *     ),
     *     @SWG\Response(
     *         response="404",
     *         description="Notebook is not found",
     *     )
     * )
     */
    public function get1()
    {
        return NoteBook::paginate(1);
    }
}
