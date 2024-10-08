@extends('layout.dashboard-sidenav')
@section('title','Admin Dashboard')
@section('content')


    <!-- Hero Main Content Start -->
    <div class="main-content">
        <div class="page-content">
          <!-- Cards Start -->
          <section id="cards">
            <div class="row">
              <div class="col-xl col-sm-6 align-item-stretch">
                <div class="card-item">
                  <div class="card-body">
                    <div class="align-items-center">
                      <div class="card-icon">
                        <img src="{{asset('back-end/assets/icons/card-projects.svg')}}" alt="" />
                      </div>
                      <div>
                        <h4>Projects</h4>
                        <h5>525</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl col-sm-6 align-item-stretch">
                <div class="card-item">
                  <div class="card-body">
                    <div class="align-items-center">
                      <div class="card-icon">
                        <svg
                          width="40"
                          height="52"
                          viewBox="0 0 32 50"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M28.0415 31.102C28.2176 30.2122 28.3057 29.3146 28.3057 28.4169C28.3057 23.8735 26.1043 19.6766 22.3818 17.0466L28.77 10.9363C29.1167 10.5953 28.9335 9.99858 28.4338 9.9284L19.1557 8.59767L15.0089 0.329794C14.7729 -0.116884 14.1568 -0.102923 13.9283 0.329794L9.7895 8.59767L0.511387 9.9284C0.0338794 9.99546 -0.181022 10.5952 0.183147 10.9363L6.5954 17.086C2.91298 19.7317 0.73556 23.9129 0.73556 28.4169C0.73556 34.1651 4.20973 39.0864 9.26913 41.2518H7.41185C7.07569 41.2518 6.81145 41.5196 6.81145 41.8424V44.559H4.71415C4.3779 44.559 4.11376 44.8267 4.11376 45.1495V49.4094C4.11376 49.7402 4.3779 50 4.71415 50H24.231C24.5672 50 24.8314 49.7402 24.8314 49.4094V45.1495C24.8314 44.8267 24.5672 44.559 24.231 44.559H22.1417V41.8424C22.1417 41.5196 21.8694 41.2518 21.5413 41.2518H19.7721C20.1643 41.0865 20.5487 40.8975 20.9169 40.6928H27.281C29.4802 40.6928 31.1316 38.746 31.1316 36.6061V35.1021C31.1316 33.2644 29.8913 31.4875 28.0415 31.102ZM27.105 28.4169C27.105 28.9996 27.0569 29.5823 26.9768 30.165C26.3525 29.354 25.5839 28.1649 25.2877 26.9681C25.1036 26.2043 24.4471 25.6767 23.6947 25.6767H23.5106L22.2377 18.4246C25.3038 20.8499 27.105 24.4877 27.105 28.4169ZM1.88827 10.9205L10.2778 9.72367C10.4699 9.69214 10.638 9.57406 10.7261 9.4008L14.4726 1.92823L18.219 9.4008C18.3071 9.57406 18.4752 9.69215 18.6753 9.72367L27.0569 10.9205C21.0661 16.6821 20.9249 16.7628 20.9249 16.8419C20.8367 16.9679 20.7888 17.1096 20.8207 17.2593L22.2537 25.4799L14.7448 21.5979C14.5766 21.5113 14.3685 21.5113 14.1924 21.5979L6.69144 25.4799L8.11641 17.3144C8.14556 17.1807 8.13305 16.9289 7.96426 16.7632C7.3643 16.173 3.468 12.4395 1.88827 10.9205ZM1.93634 28.4169C1.93634 24.5507 3.68945 20.9444 6.68342 18.5112L5.30654 26.4563C5.29852 26.4799 5.30654 26.4956 5.30654 26.5193C4.41786 28.0941 3.94558 29.8658 3.94558 31.6847C3.94558 33.7635 4.54598 35.6927 5.57869 37.3305C3.32124 35.0234 1.93634 31.8816 1.93634 28.4169ZM5.14637 31.6847C5.14637 30.0154 5.60264 28.3776 6.44323 26.9445L14.4726 22.7948L20.0522 25.6767H15.9936C15.169 25.6767 14.4966 26.3697 14.4966 27.2279C14.4966 28.0862 15.169 28.787 15.9936 28.787H21.9896C22.1016 28.787 22.2057 28.9209 22.2057 29.0784C22.2057 29.2358 22.1016 29.3697 21.9896 29.3697H19.5639C18.0108 29.3697 16.514 29.9603 15.3212 31.0154H14.8808C12.6785 31.0154 11.0222 32.9681 11.0222 35.1021V36.6061C11.0222 38.7394 12.6667 40.6928 14.8808 40.6928H17.4265C16.4979 41.0235 15.5213 41.2124 14.5367 41.2518C14.1924 41.236 13.8642 41.2046 13.528 41.1652C8.75677 40.5116 5.14637 36.5194 5.14637 31.6847ZM23.6306 45.7401V48.8189H5.31455V45.7401H23.6306ZM27.281 39.5117H14.8808C13.6801 39.5117 12.6794 38.6376 12.3511 37.4408H29.8108C29.4825 38.6376 28.4818 39.5117 27.281 39.5117ZM12.3432 34.2753C12.6794 33.0784 13.68 32.1965 14.8808 32.1965C31.94 32.2073 26.0559 32.2036 27.3291 32.2044C28.5059 32.2281 29.4825 33.0942 29.8107 34.2753H12.3432Z"
                            fill="#008AEE"
                          />
                          <path
                            d="M22.1898 12.3852L18.7716 15.6687L19.5801 20.3066C19.6515 20.7993 19.1409 21.1503 18.7076 20.9286L14.4727 18.7396L10.2379 20.9286C9.81965 21.153 9.28404 20.7992 9.37334 20.3066L10.1819 15.6687L6.7556 12.3852C6.58752 12.2277 6.53152 11.9914 6.60345 11.7788C6.67557 11.5662 6.85967 11.4088 7.08384 11.3772L11.8149 10.7001L13.9364 6.4874C14.1366 6.07793 14.8089 6.07793 15.009 6.4874L17.1305 10.7001L21.8616 11.3772C22.3404 11.4446 22.5531 12.0448 22.1898 12.3852Z"
                            fill="#192045"
                          />
                        </svg>
                      </div>
                      <div>
                        <h4>Events</h4>
                        <h5>55</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl col-sm-6 align-item-stretch">
                <div class="card-item">
                  <div class="card-body">
                    <div class="align-items-center">
                      <div class="card-icon">
                        <img src="{{asset('back-end/assets/icons/card-employe.svg')}}" alt="" />
                      </div>
                      <div>
                        <h4>Employees</h4>
                        <h5>25</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl col-sm-6 align-item-stretch">
                <div class="card-item">
                  <div class="card-body">
                    <div class="align-items-center">
                      <div class="card-icon">
                        <img src="{{asset('back-end/assets/icons/card-client.svg')}}" alt="" />
                      </div>
                      <div>
                        <h4>Clients</h4>
                        <h5>45</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl col-sm-6 align-item-stretch">
                <div class="card-item">
                  <div class="card-body">
                    <div class="align-items-center">
                      <div class="card-icon">
                        <img src="{{asset('back-end/assets/icons/card-reports.svg')}}" alt="" />
                      </div>
                      <div>
                        <h4>Reports</h4>
                        <h5>50</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Cards End -->

          <!-- Dashboard Charts Start -->
          <section id="data_table">
            <div class="invoice-btn">
              <h1>Invoices</h1>
              <div class="table-btn-item">
                <button type="submit" class="view-more-btn">View More</button>
                <button id="openModalBtn" type="button" class="create-invoice">
                  <span>+</span>
                  <h3>Create Invoice</h3>
                </button>
              </div>
            </div>
            <div class="table-wrapper">
              <table id="example" class="display" style="width: 100%">
                <thead>
                  <tr>
                    <th>Serial No:</th>
                    <th>Invoice</th>
                    <th>Project</th>
                    <th>Client</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Example data -->
                  <tr>
                    <td class="serial"><span>113</span></td>
                    <td class="invoice"><span>INV#01</span></td>
                    <td class="project"><span>Ronghill - Front-end Design</span></td>
                    <td class="client">
                      <div class="client-details">
                        <div class="client-profile">
                          <img src="{{asset('back-end/assets/img/table-client-img.png')}}" alt="" />
                        </div>
                        <div class="details">
                          <h1>Thomas Lee</h1>
                          <h2>User ID: #5402</h2>
                        </div>
                      </div>
                    </td>
                    <td class="total">
                      <h1><span>Total:</span> $550.00</h1>
                      <h2><span>Paid:</span>$550.00</h2>
                      <h3>Unpaid: $0.00</h3>
                    </td>
                    <td class="date"><span>31, Jan 2022</span></td>
                    <td class="status"><span class="paid">Paid</span></td>
                    <td class="edit">
                      <div class="icon">
                        <svg
                          width="50"
                          height="50"
                          viewBox="0 0 50 50"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <rect width="50" height="50" rx="5" fill="none" />
                          <path
                            d="M31.7474 30.2104L33.6363 28.3357C33.9315 28.0428 34.445 28.2478 34.445 28.6696V37.1879C34.445 38.7404 33.1759 40 31.6116 40H10.8334C9.26912 40 8 38.7404 8 37.1879V16.5659C8 15.0134 9.26912 13.7538 10.8334 13.7538H26.9778C27.3969 13.7538 27.6095 14.2577 27.3143 14.5565L25.4254 16.4312C25.3368 16.5191 25.2188 16.5659 25.0889 16.5659H10.8334V37.1879H31.6116V30.5385C31.6116 30.4155 31.6588 30.2983 31.7474 30.2104ZM40.9913 18.3879L25.4903 33.7724L20.1541 34.3582C18.6075 34.5281 17.2912 33.2334 17.4624 31.6868L18.0526 26.3907L33.5537 11.0062C34.9054 9.6646 37.0895 9.6646 38.4354 11.0062L40.9854 13.5371C42.3372 14.8787 42.3372 17.0522 40.9913 18.3879ZM35.1593 20.1982L31.7297 16.7944L20.7621 27.6854L20.3312 31.511L24.1858 31.0833L35.1593 20.1982ZM38.9844 15.529L36.4343 12.9981C36.1923 12.7579 35.7968 12.7579 35.5607 12.9981L33.7367 14.8084L37.1663 18.2122L38.9903 16.4019C39.2264 16.1558 39.2264 15.7692 38.9844 15.529Z"
                            fill="#192045"
                          />
                        </svg>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="serial"><span>114</span></td>
                    <td class="invoice"><span>INV#02</span></td>
                    <td class="project"><span>Ronghill - Front-end Design</span></td>
                    <td class="client">
                      <div class="client-details">
                        <div class="client-profile">
                          <img src="{{asset('back-end/assets/img/table-client-img.png')}}" alt="" />
                        </div>
                        <div class="details">
                          <h1>Tony Park</h1>
                          <h2>User ID: #5142</h2>
                        </div>
                      </div>
                    </td>
                    <td class="total">
                      <h1><span>Total:</span> $550.00</h1>
                      <h2><span>Paid:</span>$550.00</h2>
                      <h3>Unpaid: $0.00</h3>
                    </td>
                    <td class="date"><span>10, Feb 2022</span></td>
                    <td class="status"><span class="due">Due</span></td>
                    <td class="edit">
                      <div class="icon">
                        <svg
                          width="50"
                          height="50"
                          viewBox="0 0 50 50"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <rect width="50" height="50" rx="5" fill="none" />
                          <path
                            d="M31.7474 30.2104L33.6363 28.3357C33.9315 28.0428 34.445 28.2478 34.445 28.6696V37.1879C34.445 38.7404 33.1759 40 31.6116 40H10.8334C9.26912 40 8 38.7404 8 37.1879V16.5659C8 15.0134 9.26912 13.7538 10.8334 13.7538H26.9778C27.3969 13.7538 27.6095 14.2577 27.3143 14.5565L25.4254 16.4312C25.3368 16.5191 25.2188 16.5659 25.0889 16.5659H10.8334V37.1879H31.6116V30.5385C31.6116 30.4155 31.6588 30.2983 31.7474 30.2104ZM40.9913 18.3879L25.4903 33.7724L20.1541 34.3582C18.6075 34.5281 17.2912 33.2334 17.4624 31.6868L18.0526 26.3907L33.5537 11.0062C34.9054 9.6646 37.0895 9.6646 38.4354 11.0062L40.9854 13.5371C42.3372 14.8787 42.3372 17.0522 40.9913 18.3879ZM35.1593 20.1982L31.7297 16.7944L20.7621 27.6854L20.3312 31.511L24.1858 31.0833L35.1593 20.1982ZM38.9844 15.529L36.4343 12.9981C36.1923 12.7579 35.7968 12.7579 35.5607 12.9981L33.7367 14.8084L37.1663 18.2122L38.9903 16.4019C39.2264 16.1558 39.2264 15.7692 38.9844 15.529Z"
                            fill="#192045"
                          />
                        </svg>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="serial"><span>114</span></td>
                    <td class="invoice"><span>INV#02</span></td>
                    <td class="project"><span>Ronghill - Front-end Design</span></td>
                    <td class="client">
                      <div class="client-details">
                        <div class="client-profile">
                          <img src="{{asset('back-end/assets/img/table-client-img.png')}}" alt="" />
                        </div>
                        <div class="details">
                          <h1>Tony Park</h1>
                          <h2>User ID: #5142</h2>
                        </div>
                      </div>
                    </td>
                    <td class="total">
                      <h1><span>Total:</span> $550.00</h1>
                      <h2><span>Paid:</span>$550.00</h2>
                      <h3>Unpaid: $0.00</h3>
                    </td>
                    <td class="date"><span>10, Feb 2022</span></td>
                    <td class="status"><span class="partial-paid">Partial Paid</span></td>
                    <td class="edit">
                      <div class="icon">
                        <svg
                          width="50"
                          height="50"
                          viewBox="0 0 50 50"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <rect width="50" height="50" rx="5" fill="none" />
                          <path
                            d="M31.7474 30.2104L33.6363 28.3357C33.9315 28.0428 34.445 28.2478 34.445 28.6696V37.1879C34.445 38.7404 33.1759 40 31.6116 40H10.8334C9.26912 40 8 38.7404 8 37.1879V16.5659C8 15.0134 9.26912 13.7538 10.8334 13.7538H26.9778C27.3969 13.7538 27.6095 14.2577 27.3143 14.5565L25.4254 16.4312C25.3368 16.5191 25.2188 16.5659 25.0889 16.5659H10.8334V37.1879H31.6116V30.5385C31.6116 30.4155 31.6588 30.2983 31.7474 30.2104ZM40.9913 18.3879L25.4903 33.7724L20.1541 34.3582C18.6075 34.5281 17.2912 33.2334 17.4624 31.6868L18.0526 26.3907L33.5537 11.0062C34.9054 9.6646 37.0895 9.6646 38.4354 11.0062L40.9854 13.5371C42.3372 14.8787 42.3372 17.0522 40.9913 18.3879ZM35.1593 20.1982L31.7297 16.7944L20.7621 27.6854L20.3312 31.511L24.1858 31.0833L35.1593 20.1982ZM38.9844 15.529L36.4343 12.9981C36.1923 12.7579 35.7968 12.7579 35.5607 12.9981L33.7367 14.8084L37.1663 18.2122L38.9903 16.4019C39.2264 16.1558 39.2264 15.7692 38.9844 15.529Z"
                            fill="#192045"
                          />
                        </svg>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="serial"><span>113</span></td>
                    <td class="invoice"><span>INV#01</span></td>
                    <td class="project"><span>Ronghill - Front-end Design</span></td>
                    <td class="client">
                      <div class="client-details">
                        <div class="client-profile">
                          <img src="{{asset('back-end/assets/img/table-client-img.png')}}" alt="" />
                        </div>
                        <div class="details">
                          <h1>Thomas Lee</h1>
                          <h2>User ID: #5402</h2>
                        </div>
                      </div>
                    </td>
                    <td class="total">
                      <h1><span>Total:</span> $550.00</h1>
                      <h2><span>Paid:</span>$550.00</h2>
                      <h3>Unpaid: $0.00</h3>
                    </td>
                    <td class="date"><span>31, Jan 2022</span></td>
                    <td class="status"><span class="paid">Paid</span></td>
                    <td class="edit">
                      <div class="icon">
                        <svg
                          width="50"
                          height="50"
                          viewBox="0 0 50 50"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <rect width="50" height="50" rx="5" fill="none" />
                          <path
                            d="M31.7474 30.2104L33.6363 28.3357C33.9315 28.0428 34.445 28.2478 34.445 28.6696V37.1879C34.445 38.7404 33.1759 40 31.6116 40H10.8334C9.26912 40 8 38.7404 8 37.1879V16.5659C8 15.0134 9.26912 13.7538 10.8334 13.7538H26.9778C27.3969 13.7538 27.6095 14.2577 27.3143 14.5565L25.4254 16.4312C25.3368 16.5191 25.2188 16.5659 25.0889 16.5659H10.8334V37.1879H31.6116V30.5385C31.6116 30.4155 31.6588 30.2983 31.7474 30.2104ZM40.9913 18.3879L25.4903 33.7724L20.1541 34.3582C18.6075 34.5281 17.2912 33.2334 17.4624 31.6868L18.0526 26.3907L33.5537 11.0062C34.9054 9.6646 37.0895 9.6646 38.4354 11.0062L40.9854 13.5371C42.3372 14.8787 42.3372 17.0522 40.9913 18.3879ZM35.1593 20.1982L31.7297 16.7944L20.7621 27.6854L20.3312 31.511L24.1858 31.0833L35.1593 20.1982ZM38.9844 15.529L36.4343 12.9981C36.1923 12.7579 35.7968 12.7579 35.5607 12.9981L33.7367 14.8084L37.1663 18.2122L38.9903 16.4019C39.2264 16.1558 39.2264 15.7692 38.9844 15.529Z"
                            fill="#192045"
                          />
                        </svg>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="serial"><span>114</span></td>
                    <td class="invoice"><span>INV#02</span></td>
                    <td class="project"><span>Ronghill - Front-end Design</span></td>
                    <td class="client">
                      <div class="client-details">
                        <div class="client-profile">
                          <img src="{{asset('back-end/assets/img/table-client-img.png')}}" alt="" />
                        </div>
                        <div class="details">
                          <h1>Tony Park</h1>
                          <h2>User ID: #5142</h2>
                        </div>
                      </div>
                    </td>
                    <td class="total">
                      <h1><span>Total:</span> $550.00</h1>
                      <h2><span>Paid:</span>$550.00</h2>
                      <h3>Unpaid: $0.00</h3>
                    </td>
                    <td class="date"><span>10, Feb 2022</span></td>
                    <td class="status"><span class="due">Due</span></td>
                    <td class="edit">
                      <div class="icon">
                        <svg
                          width="50"
                          height="50"
                          viewBox="0 0 50 50"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <rect width="50" height="50" rx="5" fill="none" />
                          <path
                            d="M31.7474 30.2104L33.6363 28.3357C33.9315 28.0428 34.445 28.2478 34.445 28.6696V37.1879C34.445 38.7404 33.1759 40 31.6116 40H10.8334C9.26912 40 8 38.7404 8 37.1879V16.5659C8 15.0134 9.26912 13.7538 10.8334 13.7538H26.9778C27.3969 13.7538 27.6095 14.2577 27.3143 14.5565L25.4254 16.4312C25.3368 16.5191 25.2188 16.5659 25.0889 16.5659H10.8334V37.1879H31.6116V30.5385C31.6116 30.4155 31.6588 30.2983 31.7474 30.2104ZM40.9913 18.3879L25.4903 33.7724L20.1541 34.3582C18.6075 34.5281 17.2912 33.2334 17.4624 31.6868L18.0526 26.3907L33.5537 11.0062C34.9054 9.6646 37.0895 9.6646 38.4354 11.0062L40.9854 13.5371C42.3372 14.8787 42.3372 17.0522 40.9913 18.3879ZM35.1593 20.1982L31.7297 16.7944L20.7621 27.6854L20.3312 31.511L24.1858 31.0833L35.1593 20.1982ZM38.9844 15.529L36.4343 12.9981C36.1923 12.7579 35.7968 12.7579 35.5607 12.9981L33.7367 14.8084L37.1663 18.2122L38.9903 16.4019C39.2264 16.1558 39.2264 15.7692 38.9844 15.529Z"
                            fill="#192045"
                          />
                        </svg>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="serial"><span>114</span></td>
                    <td class="invoice"><span>INV#02</span></td>
                    <td class="project"><span>Ronghill - Front-end Design</span></td>
                    <td class="client">
                      <div class="client-details">
                        <div class="client-profile">
                          <img src="{{asset('back-end/assets/img/table-client-img.png')}}" alt="" />
                        </div>
                        <div class="details">
                          <h1>Tony Park</h1>
                          <h2>User ID: #5142</h2>
                        </div>
                      </div>
                    </td>
                    <td class="total">
                      <h1><span>Total:</span> $550.00</h1>
                      <h2><span>Paid:</span>$550.00</h2>
                      <h3>Unpaid: $0.00</h3>
                    </td>
                    <td class="date"><span>10, Feb 2022</span></td>
                    <td class="status"><span class="partial-paid">Partial Paid</span></td>
                    <td class="edit">
                      <div class="icon">
                        <svg
                          width="50"
                          height="50"
                          viewBox="0 0 50 50"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <rect width="50" height="50" rx="5" fill="none" />
                          <path
                            d="M31.7474 30.2104L33.6363 28.3357C33.9315 28.0428 34.445 28.2478 34.445 28.6696V37.1879C34.445 38.7404 33.1759 40 31.6116 40H10.8334C9.26912 40 8 38.7404 8 37.1879V16.5659C8 15.0134 9.26912 13.7538 10.8334 13.7538H26.9778C27.3969 13.7538 27.6095 14.2577 27.3143 14.5565L25.4254 16.4312C25.3368 16.5191 25.2188 16.5659 25.0889 16.5659H10.8334V37.1879H31.6116V30.5385C31.6116 30.4155 31.6588 30.2983 31.7474 30.2104ZM40.9913 18.3879L25.4903 33.7724L20.1541 34.3582C18.6075 34.5281 17.2912 33.2334 17.4624 31.6868L18.0526 26.3907L33.5537 11.0062C34.9054 9.6646 37.0895 9.6646 38.4354 11.0062L40.9854 13.5371C42.3372 14.8787 42.3372 17.0522 40.9913 18.3879ZM35.1593 20.1982L31.7297 16.7944L20.7621 27.6854L20.3312 31.511L24.1858 31.0833L35.1593 20.1982ZM38.9844 15.529L36.4343 12.9981C36.1923 12.7579 35.7968 12.7579 35.5607 12.9981L33.7367 14.8084L37.1663 18.2122L38.9903 16.4019C39.2264 16.1558 39.2264 15.7692 38.9844 15.529Z"
                            fill="#192045"
                          />
                        </svg>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="serial"><span>113</span></td>
                    <td class="invoice"><span>INV#01</span></td>
                    <td class="project"><span>Ronghill - Front-end Design</span></td>
                    <td class="client">
                      <div class="client-details">
                        <div class="client-profile">
                          <img src="{{asset('back-end/assets/img/table-client-img.png')}}" alt="" />
                        </div>
                        <div class="details">
                          <h1>Thomas Lee</h1>
                          <h2>User ID: #5402</h2>
                        </div>
                      </div>
                    </td>
                    <td class="total">
                      <h1><span>Total:</span> $550.00</h1>
                      <h2><span>Paid:</span>$550.00</h2>
                      <h3>Unpaid: $0.00</h3>
                    </td>
                    <td class="date"><span>31, Jan 2022</span></td>
                    <td class="status"><span class="paid">Paid</span></td>
                    <td class="edit">
                      <div class="icon">
                        <svg
                          width="50"
                          height="50"
                          viewBox="0 0 50 50"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <rect width="50" height="50" rx="5" fill="none" />
                          <path
                            d="M31.7474 30.2104L33.6363 28.3357C33.9315 28.0428 34.445 28.2478 34.445 28.6696V37.1879C34.445 38.7404 33.1759 40 31.6116 40H10.8334C9.26912 40 8 38.7404 8 37.1879V16.5659C8 15.0134 9.26912 13.7538 10.8334 13.7538H26.9778C27.3969 13.7538 27.6095 14.2577 27.3143 14.5565L25.4254 16.4312C25.3368 16.5191 25.2188 16.5659 25.0889 16.5659H10.8334V37.1879H31.6116V30.5385C31.6116 30.4155 31.6588 30.2983 31.7474 30.2104ZM40.9913 18.3879L25.4903 33.7724L20.1541 34.3582C18.6075 34.5281 17.2912 33.2334 17.4624 31.6868L18.0526 26.3907L33.5537 11.0062C34.9054 9.6646 37.0895 9.6646 38.4354 11.0062L40.9854 13.5371C42.3372 14.8787 42.3372 17.0522 40.9913 18.3879ZM35.1593 20.1982L31.7297 16.7944L20.7621 27.6854L20.3312 31.511L24.1858 31.0833L35.1593 20.1982ZM38.9844 15.529L36.4343 12.9981C36.1923 12.7579 35.7968 12.7579 35.5607 12.9981L33.7367 14.8084L37.1663 18.2122L38.9903 16.4019C39.2264 16.1558 39.2264 15.7692 38.9844 15.529Z"
                            fill="#192045"
                          />
                        </svg>
                      </div>
                    </td>
                  </tr>


                  <!-- Add more rows as needed -->
                </tbody>
              </table>
            </div>
          </section>
          <div class="copyright">
            <p>&copy; 2024. All Rights Reserved.</p>
          </div>

          <!-- Dashboard Charts End -->
        </div>
      </div>
      <!-- Hero Main Content End -->

@endsection
