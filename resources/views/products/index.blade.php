@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h1 class="text-success fw-bold mb-2">🥬 Chào mừng đến cửa hàng Rau Củ</h1>
        <p class="text-muted">Những sản phẩm tươi ngon, sạch sẽ, được chọn lọc kỹ lưỡng</p>
        <br> 
        <p class="text-muted"> ĐƯỢC CHỌN LỌK KĨ CÀNG BỞI CHUYÊN GIA DINH DƯỠNG TRẦN TRỌNG MINH :> </P>
    </div>
</div>

<div class="row">
    @forelse($products as $product)
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white text-center py-5 fs-1">
    @if(strpos($product->name, 'Cà chua') !== false) 🍅
    @elseif(strpos($product->name, 'Dưa leo') !== false) 🥒
    @elseif(strpos($product->name, 'Bắp cải') !== false) 🥦
    @elseif(strpos($product->name, 'Cà rốt') !== false) 🥕
    @elseif(strpos($product->name, 'Hành tây') !== false) 🧅
    @elseif(strpos($product->name, 'Cải xoăn') !== false) 🥬
    @else 🥦
    @endif
</div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-success fw-bold">{{ $product->name }}</h5>
                    <p class="card-text text-muted flex-grow-1">{{ $product->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fs-5 text-danger fw-bold">{{ number_format($product->price) }}₫</span>
                        <small class="text-muted">Còn: {{ $product->quantity }}</small>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="input-group mb-2">
                            <input type="number" name="quantity" value="1" min="1" max="{{ $product->quantity }}" class="form-control" required>
                            <button class="btn btn-success" type="submit">Thêm vào giỏ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <p>Hiện tại không có sản phẩm nào</p>
            </div>
        </div>
    @endforelse
</div>
@endsection