<!-- ユーザー認証のヘッダー部分コード -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- タイトル変更 -->
    <title>Attendance Management</title>
    <!-- cssの適用 -->
    <link rel="stylesheet" href="{{ asset('css/sanitize.css) }}">
    <link rel="stylesheet" href="{{ asset('css/common.css) }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <!-- ヘッダー内のアイテム -->
        <div class="header__inner">
            <div class="header-utilities">
                <a class="header__logo" href="/">
                    Attendance Management
                </a>
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/mypage">マイページ</a>
                        </li>
                        <li class="header-nav__item">
                            <from>
                                <button class="header-nav__button">ログアウト</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>