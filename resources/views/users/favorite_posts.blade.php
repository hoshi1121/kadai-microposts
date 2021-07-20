@if (count($favorites) > 0)
    <ul class="list-unstyled">
        @foreach ($favorites as $favorite)
            <li class="media">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $micropost->user->name, ['user' => $micropost->user->id]) !!}
                        <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                    </div>
                    
                    <div>
                        {{-- お気に入りした投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($favorite->content)) !!}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $favorite->user_id)
                         {{-- お気に入り削除のフォーム --}}
                            {!! Form::open(['route' => ['favorites.destroy', $favorite->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Unfavorite', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                        @if (Auth::id() == $micropost->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $favorites->links() }}
@endif