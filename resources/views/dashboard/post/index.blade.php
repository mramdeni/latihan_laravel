@extends('layout.index')

@section('title', 'List Post')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Post</h1>
            <div class="ml-3">
                <a href="{{route ('post.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="/dashboard">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">List Post</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data List</h4>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h4>Filter</h4>
                            </div>
                            @if (Session::has('danger'))
                                <p class="alert alert-danger">
                            {{ Session::get('danger') }}
                                </p>
                            @endif
                            @if (Session::has('success'))
                                <p class="alert alert-success">
                            {{ Session::get('success') }}
                                </p>
                            @endif
                            <div class="card-body">
                                <form action="{{ route('post.index') }}" method="GET">
                                    <div class="row">
                                        <div class="form-group col-3">
                                            <label for="">Post Name</label>
                                            <input type="text" name="q" class="form-control" placeholder="Post name">
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="" selected>All</option>
                                                <option value="0">Draft</option>
                                                <option value="1">Publish</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="">Start Date</label>
                                            <input type="date" name="from_date" class="form-control">
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="">End Date</label>
                                            <input type="date" name="to_date" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button class="btn btn-primary">
                                                Filter
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>CreatedAt</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($data as $key => $val)
                                    <tr>
                                        <td>{{ $val->id }}</td>
                                        <td>
                                            <img src="{{ $val->photo }}" alt="" width="50px">
                                        </td>
                                        <td>{{ $val->title }}</td>
                                        <td>
                                            @if ($val->is_active == 1)
                                                <div class="badge badge-success">
                                                    Active
                                                </div>
                                            @else
                                                <div class="badge badge-danger">
                                                    Non-active
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $val->category->name }}
                                        </td>
                                        <td>
                                            {{ $val->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-secondary">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            tidak ada data
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination mb-0 pt-5">
                            {!! $data->links('components.paginations') !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection