@extends('layouts.app')

@section('title', 'Giỏ hàng')

@section('content')
<h1 class="text-success fw-bold mb-4">🛒 Giỏ hàng của bạn</h1>

@if(count($cart) > 0)
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-success">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $id => $item)
                                <tr>
                                    <td class="fw-bold">{{ $item['name'] }}</td>
                                    <td>{{ number_format($item['price']) }}₫</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td class="text-danger fw-bold">{{ number_format($item['price'] * $item['quantity']) }}₫</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chứ?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-success">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Tóm tắt đơn hàng</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 border-bottom pb-3">
                        <span>Tổng cộng:</span>
                        <strong class="text-danger fs-5">{{ number_format($total) }}₫</strong>
                    </div>
                    <a href="{{ route('order.store') }}" class="btn btn-success w-100 btn-lg">Tiến hành thanh toán</a>
                    <a href="/" class="btn btn-outline-success w-100 mt-2">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info text-center py-5">
        <h4>Giỏ hàng của bạn trống</h4>
        <p class="mb-0">Hãy <a href="/">quay lại trang chủ</a> để mua sắm</p>
    </div>
@endif
@endsection
