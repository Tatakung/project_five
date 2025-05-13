<!-- resources/views/projects.blade.php -->
@extends('layouts.adminlayout')

@section('title', 'โครงการ')

@section('content')
    <style>
        /* Styles เฉพาะของหน้า Projects */
        .project-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #3498db;
        }

        .card h3 {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .card p {
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        .documents-section {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .documents-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .documents-table {
            width: 100%;
            border-collapse: collapse;
        }

        .documents-table th {
            background-color: #f8f9fa;
            padding: 12px 15px;
            text-align: left;
            font-weight: 500;
            color: #666;
            border-bottom: 1px solid #e0e0e0;
        }

        .documents-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .status {
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
            display: inline-block;
        }

        .status-done {
            background-color: #e3f9e5;
            color: #27ae60;
        }

        .status-pending {
            background-color: #fff3e0;
            color: #f39c12;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-view {
            background-color: #e3f2fd;
            color: #2196f3;
        }

        .btn-edit {
            background-color: #fff3e0;
            color: #ff9800;
        }

        .btn-print {
            background-color: #e8f5e9;
            color: #4caf50;
        }

        .btn-committee {
            background-color: #f3e5f5;
            color: #9c27b0;
        }

        .btn-view:hover {
            background-color: #bbdefb;
        }

        .btn-edit:hover {
            background-color: #ffe0b2;
        }

        .btn-print:hover {
            background-color: #c8e6c9;
        }

        .btn-committee:hover {
            background-color: #e1bee7;
        }

        .no-documents {
            text-align: center;
            padding: 20px;
            color: #7f8c8d;
        }

        .documents-header-action {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn-add {
            background-color: #3498db;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-add:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .project-cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .documents-table thead {
                display: none;
            }

            .documents-table tbody td {
                display: flex;
                padding: 8px 10px;
                text-align: right;
                border-bottom: none;
            }

            .documents-table tbody td:before {
                content: attr(data-label);
                font-weight: bold;
                flex: 1;
                text-align: left;
            }

            .documents-table tbody tr {
                display: block;
                margin-bottom: 15px;
                border-bottom: 1px solid #e0e0e0;
            }
        }
    </style>
    <div>
        <p style="color: #051f3f ; text-decoration: underline;"><i class="fa-solid fa-house-user" style="color: #3498db;"></i>
            แอดมิน
        </p>
    </div>

    {{-- <h2 class="section-title"><i class="fa-solid fa-list-check"></i> ชื่อสถาบันเกษตรกร</h2> --}}
    <div class="documents-section">
        <div class="documents-header-action">
            <h3>รายชื่อสถาบันเกษตรกร <span style="font-size: 14px;">(14 สถาบัน)</span></h3>
            <button class="btn-add"><i class="fas fa-plus"></i> เพิ่มสถาบันเกษตรกร</button>
        </div>
        <table class="documents-table">
            <thead>
                <tr>
                    <th>เลขทะเบียนสถาบัน</th>
                    <th>ชื่อสถาบันเกษตรกร</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td data-label="เลขทะเบียนสถาบัน">{{ $item['id'] }}</td>
                        <td data-label="ชื่อสถาบันเกษตรกร">{{ $item['name'] }}</td>
                        <td data-label="จัดการ">
                            <div class="action-buttons">
                                <a class="btn-icon btn-view" href="" title="ดูรายละเอียด">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn-icon btn-committee"
                                    href="{{ route('manageMember', ['id' => $item['id'], 'group' => $item['group']]) }}"
                                    title="จัดการคณะกรรมการ">
                                    <i class="fas fa-users"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
