@extends('layouts.base')

@section('content')

<!-- Page title -->
<div class="page-header text-white">
    <div class="row align-items-center">
        <div class="col-auto">
            <h2 class="page-title">
                <a href={{str_replace(url('/'), '', url()->previous())}} class="app-back-button mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                            fill="rgba(255,255,255,1)" /></svg>
                </a>
                Mes notifications
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ml-auto d-print-none">
            <div class="d-flex align-items-center">
                <a href={{route('admin.profile')}} class="d-flex align-items-center text-white mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"
                            fill="rgba(255,255,255,1)" /></svg>
                    Mon compte
                </a>

                <a href="#" class="d-flex align-items-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M19.938 8H21a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-1.062A8.001 8.001 0 0 1 12 23v-2a6 6 0 0 0 6-6V9A6 6 0 1 0 6 9v7H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1.062a8.001 8.001 0 0 1 15.876 0zM3 10v4h1v-4H3zm17 0v4h1v-4h-1zM7.76 15.785l1.06-1.696A5.972 5.972 0 0 0 12 15a5.972 5.972 0 0 0 3.18-.911l1.06 1.696A7.963 7.963 0 0 1 12 17a7.963 7.963 0 0 1-4.24-1.215z"
                            fill="rgba(255,255,255,1)" /></svg>
                    Suupport
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="view card col-lg-12 ml-4 p-3" style="height: 700px; max-height: 700px;">
        <div class="table-responsive">
            <table class="table card-table table-vcenter">
              <tbody>
                <tr class="notification-line">
                    <td class="w-1 notification-line-icon">
                      <span class="bg-yellow-lt text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg"
                              class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z"></path>
                              <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                              <line x1="8" y1="9" x2="16" y2="9"></line>
                              <line x1="8" y1="13" x2="14" y2="13"></line>
                          </svg>
                      </span>
                    </td>
                    <td class="td-truncate">
                      <div class="text-truncate">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit
                      </div>
                    </td>
                    <td class="text-nowrap text-muted">il y a 5min</td>
                </tr>
                <tr class="notification-line">
                    <td class="w-1 notification-line-icon">
                      <span class="bg-yellow-lt text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg"
                              class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z"></path>
                              <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                              <line x1="8" y1="9" x2="16" y2="9"></line>
                              <line x1="8" y1="13" x2="14" y2="13"></line>
                          </svg>
                      </span>
                    </td>
                    <td class="td-truncate">
                      <div class="text-truncate">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit
                      </div>
                    </td>
                    <td class="text-nowrap text-muted">il y a 5min</td>
                </tr>
                <tr class="notification-line">
                    <td class="w-1 notification-line-icon">
                      <span class="bg-yellow-lt text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg"
                              class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z"></path>
                              <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                              <line x1="8" y1="9" x2="16" y2="9"></line>
                              <line x1="8" y1="13" x2="14" y2="13"></line>
                          </svg>
                      </span>
                    </td>
                    <td class="td-truncate">
                      <div class="text-truncate">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit
                      </div>
                    </td>
                    <td class="text-nowrap text-muted">il y a 5min</td>
                </tr>
                <tr class="notification-line">
                    <td class="w-1 notification-line-icon">
                      <span class="bg-yellow-lt text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg"
                              class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z"></path>
                              <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                              <line x1="8" y1="9" x2="16" y2="9"></line>
                              <line x1="8" y1="13" x2="14" y2="13"></line>
                          </svg>
                      </span>
                    </td>
                    <td class="td-truncate">
                      <div class="text-truncate">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit
                      </div>
                    </td>
                    <td class="text-nowrap text-muted">il y a 5min</td>
                </tr>
                <tr class="notification-line">
                    <td class="w-1 notification-line-icon">
                      <span class="bg-yellow-lt text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg"
                              class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z"></path>
                              <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                              <line x1="8" y1="9" x2="16" y2="9"></line>
                              <line x1="8" y1="13" x2="14" y2="13"></line>
                          </svg>
                      </span>
                    </td>
                    <td class="td-truncate">
                      <div class="text-truncate">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit
                      </div>
                    </td>
                    <td class="text-nowrap text-muted">il y a 5min</td>
                </tr>
                <tr class="notification-line">
                    <td class="w-1 notification-line-icon">
                      <span class="bg-yellow-lt text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg"
                              class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z"></path>
                              <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                              <line x1="8" y1="9" x2="16" y2="9"></line>
                              <line x1="8" y1="13" x2="14" y2="13"></line>
                          </svg>
                      </span>
                    </td>
                    <td class="td-truncate">
                      <div class="text-truncate">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit
                      </div>
                    </td>
                    <td class="text-nowrap text-muted">il y a 5min</td>
                </tr>
              </tbody>
            </table>
          </div>
    </div>
</div>

@endsection


@section('scripts')

    <script>

    </script>

@endsection
