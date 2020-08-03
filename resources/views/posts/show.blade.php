@extends('main')

@section('title','View Post')

@section('content')
<?php 
      list($width, $height) = getimagesize(public_path('images\\' . $post->image));
      $user = Auth::user();
?>
    <div class="row">
        <div class="col-md-8">
            <h2>{{ $post->title }}</h2>
            
            @if($width > $height)
                <img src="{{ asset('images/' . $post->image) }}" alt="image" style="width:600px;height:300px;">
            @else
                <img src="{{ asset('images/' . $post->image) }}" alt="image" style="width:400px;height:600px;">
            @endif

            <p style="margin-top:20px;font-size:18px;letter-spacing:1px;word-wrap:break-word; word-break:normal;">{{ $post -> body }}</p>
            <div id="backend-comments" style="margin-top:100px;">
                <h3>留言區</h3>
                <h5 style="margin-top:20px;">{{ $post->comments()->count()}}則留言</h5>
                <table class="table">
					<thead>
						<tr>
							<th>名字</th>
							<!-- <th>郵件</th> -->
							<th>留言內容</th>
							<th width="70px"></th>
						</tr>
					</thead>

					<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<!-- <td>{{ $comment->email }}</td> -->
							<td>{{ $comment->comment }}</td>
							<td>
                            @if ($post->user_name == $user->name)
								<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-secondary"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
  <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
</svg></a>
                                <div style="margin-bottom:10px;"></div>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
</svg></a>
                            @endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
            </div>
        </div>
        <div class="col-md-4">
            <div style="padding:30px 20px 10px 20px;background-color:#DDDDDD;">
                <dl class="dl-horizontal">
                    <dt>作者:</dt>                    
                    <dd>{{ $post->user_name }}</dd>
                <dl>
                <!-- <dl class="dl-horizontal">
                    <label>Url:</label>                    
                    <a style="font-size:13px;color:grey;" href="{{ route('blog.single',$post->slug) }}">{{ route('blog.single',$post->slug) }}</a>
                <dl> -->
                <dl class="dl-horizontal">
                    <dt>類別:</dt>                    
                    <dd># {{ $post->category->name }}</dd>
                <dl>
                <dl class="dl-horizontal">
                    <dt>創立於:</dt>                    
                    <dd>{{ date('Y/m/j , H:i',strtotime($post->created_at)) }}</dd>
                <dl>
                <dl class="dl-horizontal">
                    <dt>上次更新於:</dt>                    
                    <dd>{{ date('Y/m/j , H:i', strtotime($post->updated_at)) }}</dd>
                <dl>
                <hr>
                <?php $user = Auth::user();?>
                @if ($post->user_name == $user->name)
                    <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit', '編輯', array($post->id), array('class' => 'btn btn-secondary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        <!-- {!! Form::open(['route'=>['posts.destroy',$post->id],'method' => 'DELETE']) !!}
                            {{ Form::submit('刪除',['class' => 'btn btn-danger btn-block']) }}
                        {!! Form::close() !!} -->
                        
                        {!! Form::open(['route'=>['posts.destroy',$post->id],'method' => 'DELETE']) !!}
                            {{ Form::submit('刪除',['class' => 'btn btn-danger btn-block']) }}
                        {!! Form::close() !!}
                        <!-- {!! Html::linkRoute('posts.show','刪除', array($post->id), array('class' => 'btn btn-danger btn-block')) !!} -->
                    </div>
                    <div class="col-sm-12" style="margin-top:10px;">
                        {{ Html::linkRoute('posts.index','查看全部文章',[],['class' => 'btn btn-light btn-block']) }}

                    </div>
                    </div>
                @endif
                    
                
            </div>
        
        </div>
    </div>
    <!-- <script>
        var deleteBtn = document.querySelector('.delete-alert');
        console.log('11sssssssssss1');
        deleteBtn.addEventListener('click',function(){
            console.log('111');
            swal.fire({
                title:'確定刪除??',
                icon:'warning',
                showCancelButton:true,
                confirmButtonText:"確定"
            }).then((result)=>{
                if(result.value){
                    swal.fire(
                        '刪除成功!!!',
                        'success'
                    )
                }
            })
        })

    </script> -->
@endsection