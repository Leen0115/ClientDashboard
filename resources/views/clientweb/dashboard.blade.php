@extends('layouts.client') 
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<div class="row mt-4">
    <!-- بطاقة 1: البحث -->
    <div class="col-md-4 mb-4">
        <div class="p-3 rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #ffff;">
            <div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-search fs-4 ms-2" style="color: #7514C0;"></i>
                    <span class="card-text">حالة الطلب: البحث</span>
                </div>
                <div class="fs-3 move-number-right">129</div>
            </div>
            <div class="d-flex flex-column align-items-end move-rate-left">
                <div class="badge rounded px-3 py-2 text-white fw-bold mb-1" style="background-color: #7514C0;">
                    <i class="bi bi-arrow-up-right"></i> +12%
                </div>
                <div class="card-text-small mt-1 m-0 p-0" style="color:#51515">مقارنة بالأسبوع الماضي</div>
            </div>
        </div>
    </div>

    <!-- بطاقة 2: في رحلة -->
    <div class="col-md-4 mt-6 mb-4">
        <div class="p-3 rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #ffff;">
            <div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-truck fs-4 ms-2" style="color: #7514C0;"></i>
                    <span class="card-text">حالة الطلب: في رحلة</span>
                </div>
                <div class="fs-3 move-number-right">78</div>
            </div>
            <div class="d-flex flex-column align-items-end move-rate-left">
                <div class="badge rounded px-3 py-2 text-white fw-bold mb-1" style="background-color: #7514C0;">
                    <i class="bi bi-arrow-up-right"></i> +12%
                </div>
                <div class="card-text-small mt-1 m-0 p-0" style="color:#51515">مقارنة بالأسبوع الماضي</div>
            </div>
        </div>
    </div>

    <!-- بطاقة 3: مكتمل -->
    <div class="col-md-4 mb-4">
        <div class="p-3 rounded shadow-sm d-flex justify-content-between align-items-center" style="background-color: #ffff;">
            <div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle fs-4 ms-2" style="color: #7514C0;"></i>
                    <span class="card-text">حالة الطلب: مكتمل</span>
                </div>
                <div class="fs-3 move-number-right">65</div>
            </div>
            <div class="d-flex flex-column align-items-end move-rate-left">
                <div class="badge rounded px-3 py-2 text-white fw-bold mb-1" style="background-color: #7514C0;">
                    <i class="bi bi-arrow-up-right"></i> +12%
                </div>
                <div class="card-text-small mt-1 m-0 p-0" style="color:#51515">مقارنة بالأسبوع الماضي</div>
            </div>
        </div>  
    </div>
</div>

<!-- نظرة عامة على إجمالي الطلبات -->
<div class="row mt-1">
    <div class="col-12">
<div class="p-3 rounded shadow-sm" style="background-color: #fff;min-height: 400px;">
    <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h5 class="fw-bold mb-1">
                        <i class="bi bi-box-seam ms-2"></i>نظرة عامة على إجمالي الطلبات</h5>
                    <p class="text-muted small mb-0">
                        هذا المخطط يعرض العدد الإجمالي للطلبات على مدار الوقت، ويساعدك على تتبع الاتجاهات والفترات النشطة.
                    </p>
                </div>
                <div class="d-flex align-items-center">
                    <!-- input التاريخ -->
   <div class="position-relative me-3" style="width:190px;">
    <!-- أيقونة التقويم -->
    <i class="bi bi-calendar-event-fill position-absolute" style="top: 50%; right: 14px; transform: translateY(-50%); color: #888;"></i>
    
    <!-- سهم ▼ -->
    <i class="bi bi-chevron-down position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%); color: #888;"></i>
    
    <!-- input -->
    <input type="text" id="daterange" 
        class="form-control form-control-sm pe-5 ps-4 text-end" 
        placeholder="اختر نطاق التاريخ"
        style="background-color: #F6F7F9; cursor: pointer;" readonly />
</div>

                    <!-- إجمالي الطلبات -->
                    <div class="text-center p-2 rounded border " style="background-color: #F6F7F9; min-width: 100px; margin-right:10px;">
                        <div class="rounded text-muted small">إجمالي الطلبات /الرحلات</div>
                        <div class="fw-bold fs-5">12,127</div>
                    </div>
                </div>
            </div>
            <canvas id="ordersChart" style="width:1600px;height:300px"></canvas>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
     body, * {
        font-family: 'Almrai', sans-serif !important;
    }
    .icon-style { font-size: 2rem; }
    .card-custom {
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        border-radius: 10px;
        padding: 20px;
    }
    .card-text-small {
        font-size: 12px;
        margin-left:10px;
        color: #515151;
    }
    .card-text {
        font-size: 18px;
        color: #515151;
    }
    body {
        background-color: #F7F8FA;
    }
    .move-number-right {
        margin-right: 26px; 
        color: #7514C0; 
    }
    .move-rate-left {
        margin-left: 9px; 
    }
</style>
@endpush

@push('scripts')
<script>
    $(function () {
        $('#daterange').val('');

        $('#daterange').daterangepicker({
            opens: 'left',
            autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD',
                applyLabel: 'تطبيق',
                cancelLabel: 'إلغاء',
                customRangeLabel: 'نطاق مخصص',
                daysOfWeek: ['أحد', 'اثنين', 'ثلاثاء', 'أربعاء', 'خميس', 'جمعة', 'سبت'],
                monthNames: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو',
                    'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
                firstDay: 6
            },
            ranges: {
                'اليوم': [moment(), moment()],
                'أمس': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'آخر 7 أيام': [moment().subtract(6, 'days'), moment()],
                'آخر 30 يوم': [moment().subtract(29, 'days'), moment()],
                'هذا الشهر': [moment().startOf('month'), moment().endOf('month')],
                'الشهر الماضي': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function (start, end, label) {
            $('#daterange').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
        });
    });

    const ctx = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['May 01', 'May 02', 'May 03', 'May 04', 'May 05', 'May 06', 'May 07', 'May 08', 'May 09', 'May 10', 'May 11'
            , 'May 12', 'May 13', 'May 14', 'May 15', 'May 16', 'May 17', 'May 18', 'May 19' , 'May 20' , 'May 21', 'May 22', 'May 23' ,
             'May 24', 'May 25', 'May 26', 'May 27', 'May 28', 'May 29', 'May 30'],
            datasets: [{
                label: 'Total Orders',
                data: [30, 60, 130, 100, 90, 105, 125, 55, 75, 115, 110, 150, 135, 100, 115, 95,
                    85, 120, 140, 130, 110, 105, 95, 80, 70, 60, 50, 40, 30, 20],
                backgroundColor: '#7514C0',
                borderRadius: 4,
                barThickness: 18,
            }]
        },
        options: {
            responsive: true,
            
            plugins: {
                legend: { display: false },
                tooltip: {
    enabled: false, // نعطل التولتيب العادي
    external: function(context) {
        let tooltipModel = context.tooltip;

        // التحقق أو إنشاء العنصر
        let tooltipEl = document.getElementById('custom-tooltip');
        if (!tooltipEl) {
            tooltipEl = document.createElement('div');
            tooltipEl.id = 'custom-tooltip';
            tooltipEl.innerHTML = '<div class="custom-tooltip-inner shadow-sm"></div>';
            document.body.appendChild(tooltipEl);
        }

        // إذا ما فيه بيانات نخفي التولتيب
        if (tooltipModel.opacity === 0) {
            tooltipEl.style.opacity = 0;
            return;
        }

        const dataPoint = tooltipModel.dataPoints[0];
        const value = dataPoint.formattedValue;
        const label = dataPoint.label;

        const date = new Date(`${label} 2025`);
        const weekday = date.toLocaleDateString('ar-EG', { weekday: 'long' });
        const day = date.toLocaleDateString('ar-EG', { day: 'numeric', month: 'long' });

        tooltipEl.querySelector('.custom-tooltip-inner').innerHTML = `
            <div style="padding:7px 9px; background:white; border:1px solid #eee; border-radius:10px; min-width:40px;">
                <div class="d-flex align-items-center mb-1">
                    <i class="bi-bar-chart" style="color:#7514C0; font-size: 16px; margin-left: 6px;margin-top:-7px;"></i>
                    <span style="font-weight:bold; color:#7514C0;font-size: 10px;">إجمالي الطلبات</span>
                </div>
                <div style="font-size: 15px; font-weight: bold; text-align:center; color:#7514C0;">${value}</div>
                <div style="font-size:10px; color:gray; text-align:center;">${weekday}، ${day}</div>
            </div>
        `;

        const position = context.chart.canvas.getBoundingClientRect();
        tooltipEl.style.opacity = 1;
        tooltipEl.style.position = 'absolute';
        tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
        tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
        tooltipEl.style.pointerEvents = 'none';
    }
}
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: {
                        font: { family: 'Almari', size: 12 },
                        color: '#666'
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: { color: '#f0f0f0' },
                    ticks: {
                        font: { family: 'Almari', size: 12 },
                        color: '#666'
                    }
                }
            }
        }
    });
</script>

@endpush