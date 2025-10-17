@extends('layouts.app')

@section('title', 'Đặt hàng thành công')

@section('content')
<div class="text-center">
    <div class="alert alert-success py-5">
        <h2 class="text-success fw-bold mb-3">✅ Đặt hàng thành công!</h2>
        <p class="fs-5">Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi</p>
    </div>

    @if($order)
    <div class="row mt-4 mb-4">
        <div class="col-md-8 offset-md-2">
            <div class="card border-success">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Thông tin đơn hàng #{{ $order->id }}</h5>
                </div>
                <div class="card-body text-start">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Khách hàng:</strong>
                            <p>{{ $order->customer_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Trạng thái:</strong>
                            <p><span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Email:</strong>
                            <p>{{ $order->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Điện thoại:</strong>
                            <p>{{ $order->phone }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <strong>Địa chỉ giao hàng:</strong>
                        <p>{{ $order->address }}</p>
                    </div>

                    <hr>

                    <strong>Sản phẩm đã đặt:</strong>
                    <table class="table table-sm mt-2">
                        <thead class="table-light">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->product->name ?? 'N/A' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price) }}₫</td>
                                <td>{{ number_format($item->price * $item->quantity) }}₫</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="border-top pt-3 mt-3">
                        <h5 class="text-danger">Tổng cộng: {{ number_format($order->total_price) }}₫</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <a href="/" class="btn btn-success btn-lg">← Quay lại trang chủ</a>
</div>
@endsection