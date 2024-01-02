@extends('layouts/blankLayout')

@section('title', $role == 'superadmin' ? 'Dashboard - SuperAdmin' : 'Dashboard - Admin Perusahaan')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('layouts.sections.menu.verticalMenu')
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('layouts.sections.navbar.navbar')
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row">
                                <div class="col-lg-4 mb-4 order-0">
                                    @if ($role == 'superadmin')
                                        <div class="row mb-4">
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div
                                                            class="card-title d-flex align-items-start justify-content-between">
                                                            <div class="avatar flex-shrink-0">
                                                                <img src="{{ asset('assets/img/icons/unicons/chart-success.png') }}"
                                                                    alt="chart success" class="rounded" />
                                                            </div>
                                                        </div>
                                                        <span class="fw-medium d-block mb-1">Perusahaan Aktif</span>
                                                        <h3 class="card-title mb-0">
                                                            {{ $data['perusahaan_aktif'] }}
                                                            <span class="fs-6 fw-light">Perusahaan</span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div
                                                            class="card-title d-flex align-items-start justify-content-between">
                                                            <div class="avatar flex-shrink-0">
                                                                <img src="{{ asset('assets/img/icons/unicons/chart-success.png') }}"
                                                                    alt="chart success" class="rounded" />
                                                            </div>
                                                        </div>
                                                        <span class="fw-medium d-block mb-1">Berita</span>
                                                        <h3 class="card-title mb-0">
                                                            {{ $data['berita'] }}
                                                            <span class="fs-6 fw-light">Berita</span>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div
                                                        class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="avatar flex-shrink-0">
                                                            <img src="{{ asset('assets/img/icons/unicons/chart-success.png') }}"
                                                                alt="Credit Card" class="rounded" />
                                                        </div>
                                                    </div>
                                                    <span>Lowongan Buka</span>
                                                    <h3 class="card-title text-nowrap mb-0">
                                                        {{ $data['lowongan_buka'] }}
                                                        <span class="fs-6 fw-light">Lowongan</span>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div
                                                        class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="avatar flex-shrink-0">
                                                            <img src="{{ asset('assets/img/icons/unicons/chart-success.png') }}"
                                                                alt="Credit Card" class="rounded" />
                                                        </div>
                                                    </div>
                                                    <span>Lowongan Tutup</span>
                                                    <h3 class="card-title text-nowrap mb-0">
                                                        {{ $data['lowongan_tutup'] }}
                                                        <span class="fs-6 fw-light">Lowongan</span>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-12 order-3 order-md-2">
                                            <div class="col-12 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div
                                                            class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                                            <div
                                                                class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                                <div class="card-title">
                                                                    <h5 class="text-nowrap mb-2">Profile Report</h5>
                                                                    <span class="badge bg-label-warning rounded-pill">Year
                                                                        2021</span>
                                                                </div>
                                                                <div class="mt-sm-auto">
                                                                    <small class="text-success text-nowrap fw-medium"><i
                                                                            class="bx bx-chevron-up"></i> 68.2%</small>
                                                                    <h3 class="mb-0">$84,686k</h3>
                                                                </div>
                                                            </div>
                                                            <div id="profileReportChart"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- {{ implode($data['year']) }} --}}
                                <div class="col-lg-8 mb-4 order-0">
                                    <div class="card">
                                        <div class="row row-bordered g-0">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-between card-header align-items-center">
                                                    <h5 class="m-0 me-2">Pembukaan Lowongan</h5>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle"
                                                            type="button" id="growthReportId" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            {{ request('year', end($data['year'])) }}
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end position-absolute"
                                                            aria-labelledby="growthReportId">
                                                            @php
                                                                rsort($data['year']);
                                                            @endphp
                                                            @foreach ($data['year'] as $item)
                                                                <a class="dropdown-item"
                                                                    href="/dashboard?year={{ $item }}">{{ $item }}</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="totalRevenueChart" class="px-2" style="min-height: 255px;">
                                                    @if (count($data['lowongan_data']) == 0)
                                                        <div class="card-body">
                                                            <p>No Data!</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('layouts.sections.footer.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        <!-- Vendors JS -->
        <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

        <!-- Page JS -->
        {{-- <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script> --}}

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>

        <script>
            (function() {
                let cardColor, headingColor, axisColor, shadeColor, borderColor;

                cardColor = config.colors.cardColor;
                headingColor = config.colors.headingColor;
                axisColor = config.colors.axisColor;
                borderColor = config.colors.borderColor;

                let lowonganData = @json($data['lowongan_data']);

                const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
                    totalRevenueChartOptions = {
                        series: [{
                            name: lowonganData[0].year,
                            data: lowonganData.map(elm => {
                                return elm.total
                            })
                        }],
                        chart: {
                            height: 240,
                            stacked: true,
                            type: 'bar',
                            toolbar: {
                                show: false
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '33%',
                                borderRadius: 12,
                                startingShape: 'rounded',
                                endingShape: 'rounded'
                            }
                        },
                        colors: [config.colors.primary, config.colors.info],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 6,
                            lineCap: 'round',
                            colors: [cardColor]
                        },
                        legend: {
                            show: true,
                            horizontalAlign: 'left',
                            position: 'top',
                            markers: {
                                height: 8,
                                width: 8,
                                radius: 12,
                                offsetX: -3
                            },
                            labels: {
                                colors: axisColor
                            },
                            itemMargin: {
                                horizontal: 10
                            }
                        },
                        grid: {
                            borderColor: borderColor,
                            padding: {
                                top: 0,
                                bottom: -8,
                                left: 20,
                                right: 20
                            }
                        },
                        xaxis: {
                            categories: lowonganData.map(elm => {
                                const date = new Date(Date.UTC(2000, elm.month - 1, 1))
                                return date.toLocaleString('default', {
                                    month: 'short'
                                })
                            }),
                            labels: {
                                style: {
                                    fontSize: '13px',
                                    colors: axisColor
                                }
                            },
                            axisTicks: {
                                show: false
                            },
                            axisBorder: {
                                show: false
                            }
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    fontSize: '13px',
                                    colors: axisColor
                                }
                            }
                        },
                        responsive: [{
                                breakpoint: 1700,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '32%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 1580,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '35%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 1440,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '42%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 1300,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '48%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 1200,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '40%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 1040,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 11,
                                            columnWidth: '48%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 991,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '30%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 840,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '35%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 768,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '28%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 640,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '32%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 576,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '37%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 480,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '45%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 420,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '52%'
                                        }
                                    }
                                }
                            },
                            {
                                breakpoint: 380,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 10,
                                            columnWidth: '60%'
                                        }
                                    }
                                }
                            }
                        ],
                        states: {
                            hover: {
                                filter: {
                                    type: 'none'
                                }
                            },
                            active: {
                                filter: {
                                    type: 'none'
                                }
                            }
                        }
                    };
                if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
                    const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
                    totalRevenueChart.render();
                }

            })();
        </script>

    </body>
@endsection
