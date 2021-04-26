<!-- column1, Vertical Dropdown Menu -->
<div id="main-menu" class="list-group">
    <a href="" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Sổ địa chỉ<span class="caret"></span></a>
    <div class="collapse show list-group-level1" id="nhahang">
        <a href="{{route('take.list')}}" class="list-group-item" data-parent="#sub-menu">Điểm lấy hàng</a>
        <a href="{{route('send.list')}}" class="list-group-item" data-parent="#sub-menu">Điểm trả hàng</a>
    </div>
    <a href="#thanhvien" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Quản lý
        thành viên <span class="caret"></span></a>
    <div class="collapseshow show list-group-level1" id="thanhvien">
        <a href="{{route('user.list')}}" class="list-group-item" data-parent="#sub-menu">Danh sách thành viên </a>
        <a href="{{route('user.creat')}}" class="list-group-item" data-parent="#sub-menu">Tạo mới thành viên </a>
    </div>

    <a href="#order" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu">Quản lý vận đơn
        <span class="caret"></span></a>
    <div class="collapse show list-group-level1" id="order">
        <a href="{{route('shipments.list')}}" class="list-group-item" data-parent="#sub-menu">Danh sách vận đơn </a>
        <a href="{{route('shipments.creat')}}" class="list-group-item" data-parent="#sub-menu">Tạo mới vận đơn </a>
        <a href="{{route('multiple-add.creat')}}" class="list-group-item" data-parent="#sub-menu">Tạo đơn nhiều điểm gửi </a>
        <a href="{{route('shipments.search')}}" class="list-group-item" data-parent="#sub-menu">Tra cứu vận đơn</a>
    </div>
</div>
