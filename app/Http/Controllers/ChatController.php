<?php

namespace App\Http\Controllers;


use App\Chat;
use App\ChatNode;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function userList()
    {
        return view('chat.list');
    }

    public function insert(Request $request)
    {
        try {

            $chat = new Chat();
            $chat->to = $request->to;
            $chat->from = $request->from;
            $chat->message = $request->message;
            $chat->node = self::createNode($request->from, $request->to);
            $chat->save();
            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function createNode($p1, $p2)
    {
        if (ChatNode::where('p1', $p1)->where('p2', $p2)->exists() || ChatNode::where('p1', $p2)->where('p2', $p1)->exists()) {
            $nodeId = "";
            if (ChatNode::where('p1', $p1)->where('p2', $p2)->exists()) {
                $nodeId = ChatNode::where('p1', $p1)->where('p2', $p2)->value('node');
            }

            if (ChatNode::where('p1', $p2)->where('p2', $p1)->exists()) {
                $nodeId = ChatNode::where('p1', $p2)->where('p2', $p1)->value('node');
            }

            return $nodeId;
        } else {
            $nodeId = rand(1000, 9999);
            $chatNode = new ChatNode();
            $chatNode->p1 = $p1;
            $chatNode->p2 = $p2;
            $chatNode->node = $nodeId;
            $chatNode->save();
            return $nodeId;

        }
    }

    public function get(Request $request)
    {
        $data = Chat::where('node', $request->nodeId)->get();
        $id = $request->to;
        return view('chat.message', compact('data', 'id'));
    }

    public function getSingle($nodeId,$to)
    {
        $data = Chat::where('node', $nodeId)->get();
        $id = $to;
        return view('chat.index', compact('data', 'id'));
    }
}









