<?php
        $inbox=DB::table('inboxes')
        ->where('sender_id','<>',Auth::user()->id)
        ->where('reciever_id',Auth::user()->id)->count();
        echo $inbox;
?>