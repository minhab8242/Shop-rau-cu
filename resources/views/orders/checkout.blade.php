@extends('layouts.app')

@section('title', 'Thanh toán')

@section('content')
<h1 class="text-success fw-bold mb-4">💳 Thông tin giao hàng</h1>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="customer_name" class="form-label fw-bold">Họ và tên</label>
                        <input type="text" class="form-control @error('customer_name') is-invalid @enderror" 
                               id="customer_name" name="customer_name" required placeholder="Nguyễn Văn A">
                        @error('customer_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" required placeholder="email@example.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">Số điện thoại</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                               id="phone" name="phone" required placeholder="0123456789">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Địa chỉ giao hàng</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" 
                                  id="address" name="address" rows="4" required placeholder="Số nhà, đường, phường..."></textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success btn-lg w-100">Xác nhận đặt hàng</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Chi tiết đơn hàng</h5>
            </div>
            <div class="card-body">
                @php
                    $total = 0;
                    foreach(session('cart', []) as $item) {
                        $total += $item['price'] * $item['quantity'];
                    }
                @endphp
                <div class="mb-3">
                    <strong class="text-danger fs-5">Tổng tiền: {{ number_format($total) }}₫</strong>
                </div>
                <hr>
                @foreach(session('cart', []) as $item)
                    <p class="mb-2">
                        <small>{{ $item['name'] }} x{{ $item['quantity'] }} = {{ number_format($item['price'] * $item['quantity']) }}₫</small>
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection