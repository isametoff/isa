<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <ul class="mt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>
                    Посты
                </p>
            </a>
        </li>
    </ul>
    <ul class="mt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.category.index') }}" class="nav-link">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                    Категории
                </p>
            </a>
        </li>
    </ul>
    <ul class="mt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.tag.index') }}" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                    Тэги
                </p>
            </a>
        </li>
    </ul>
</aside>
