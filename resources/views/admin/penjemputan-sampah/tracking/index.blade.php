@extends('layouts.main-admin')

@section('content')
    <style>
h2 {
            color: black;
            /* Hijau tua */
            margin-bottom: 15px;
            border-bottom: 3px solid #2ecc71;
            /* Hijau lebih gelap */
            display: inline-block;
            padding-bottom: 5px;
        }

        h4 {
            color: black;
            /* Hijau tua */
        }

        a.inline-block {
            transition: all 0.3s ease;
        }

        a.inline-block:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 255, 0, 0.3);
            /* Hijau */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            overflow: hidden;
            border-radius: 12px;
        }

        thead {
            background: linear-gradient(90deg, #27ae60, #2ecc71);
            /* Gradasi hijau */
            color: #ffffff;
            padding: 12px;
            text-transform: uppercase;
            font-weight: bold;
            border: none;
        }

        


        td {
            padding: 10px;
            border: 1px solid #e0e0e0;
            background: white;
            text-align: left;
            
            
        }


        th {
            text-align: center;
        }

        button {
            margin: 2px;
            border-radius: 4px;
            padding: 4px;
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 10px rgba(0, 255, 0, 0.1);
            /* Hijau */
            background-color: #27ae60;
            color: white
        }

        button:hover {
            /* Hijau */
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.3);
            /* Hijau lebih gelap */
        }

        .flex.space-x-2 button {
            margin: 0 3px;
            border-radius: 6px;
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }

        .flex.space-x-2 button:hover {
            background-color: #27ae60;
            /* Hijau lebih gelap */
            color: #fff;
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.4);
            /* Hijau lebih gelap */
        }

        .flex.space-x-2 .active {
            background-color: #2ecc71;
            /* Hijau */
            color: #fff;
        }

        /* Overlay */
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 999;
      display: none;
    }

    /* Pop-Up Container */
    .popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      border-radius: 10px;
      width: 90%;
      max-width: 800px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      display: none;

    }

    .popup-header {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    margin-bottom: 20px;
    }

    .popup-header h3 {
      margin: 0;
      text-decoration: none;
    }

    /* Timeline */
    .timeline {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .timeline-step {
      text-align: center;
      font-size: 0.9rem;
      color: black;
    }

    .timeline-step img {
      display: block;
      margin: 0 auto;
      width: 40px;
      height: 40px;
    }

    .timeline-step.active img {
      filter: brightness(0) saturate(100%) invert(50%) sepia(100%) saturate(400%) hue-rotate(120deg) brightness(90%);
    }

    .timeline-line {
      flex: 1;
      height: 2px;
      background-color: black;
      position: relative;
      top: -10px;
    }

    .timeline-line.active {
      background-color: #27ae60;
    }

    /* Content Section */
    .content {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .content-column {
      width: 48%;
      text-align: left;
    }

    .content-column h3 {
      font-size: 1rem;
      margin-bottom: 10px;
      color: black;
    }

    .content-column p {
      font-size: 0.7rem;
      margin: 5px 0;
      color: #413F3F;
    }

    /* Close Button */
    .close-btn {
      display: block;
      margin: 0 auto;
      background-color: #dc3545;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
    }

    .close-btn:hover {
      background-color: #b02a37;
    }

    

    
    </style>

    <div class="container max-w-full px-4 mx-auto bg-[#F1F5F9]">
        <div class="py-8">
            <h2 class="text-2xl font-bold leading-relaxed ml-14 text-black">Tracking Penjemputan</h2>
            <h4 class="text-base font-light ml-14 text-black">Admin dapat melakukan tracking permintaan penjemputan sampah elektronik.</h4>

            <div class="pl-12 mt-6 grid grid-cols-2">
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table id="masyarakatTable" class="w-full border border-gray-300 bg-white rounded-lg">
                        <thead>
                            <tr>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">ID Pelacakan</th>
                                <th class="border cursor-pointer px-4 py-2 text-center text-sm font-semibold text-gray-700"
                                    style="color: white">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan dimuat melalui AJAX -->
                            <tr>
                                <th> contoh untuk mengetes button detail</th>
                                <th> <button id="openPopupBtn" class="close-btn" style="background-color: #27ae60; display: block;">Detail</button>

                                    <!-- Overlay -->
                                    <div id="overlay" class="overlay"></div>
                                  
                                    <!-- Pop-Up -->
                                    <div id="popup" class="popup">
                                      <!-- Header -->
                                      <div class="popup-header flex flex-col items-center">
                                        <h3 class="text-sm font-medium text-gray-600">Estimasi Tiba:</h3>
                                        <h3 class="text-xl font-bold text-black">17.23 WIB</h3>
                                      </div>
                                      
                                  
                                      <!-- Timeline -->
                                      <div class="timeline">
                                        <div class="timeline-step active">
                                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" alt="Diproses">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M40.7024 23.0469C40.877 23.2211 41.0156 23.428 41.1101 23.6558C41.2046 23.8836 41.2533 24.1278 41.2533 24.3744C41.2533 24.6211 41.2046 24.8653 41.1101 25.0931C41.0156 25.3209 40.877 25.5278 40.7024 25.7019L29.4524 36.9519C29.2783 37.1266 29.0713 37.2651 28.8436 37.3596C28.6158 37.4541 28.3716 37.5028 28.1249 37.5028C27.8783 37.5028 27.6341 37.4541 27.4063 37.3596C27.1785 37.2651 26.9716 37.1266 26.7974 36.9519L21.1724 31.3269C20.9981 31.1526 20.8598 30.9457 20.7655 30.7179C20.6711 30.4901 20.6226 30.246 20.6226 29.9994C20.6226 29.7529 20.6711 29.5088 20.7655 29.281C20.8598 29.0532 20.9981 28.8463 21.1724 28.6719C21.3468 28.4976 21.5537 28.3593 21.7815 28.265C22.0093 28.1706 22.2534 28.1221 22.4999 28.1221C22.7465 28.1221 22.9906 28.1706 23.2184 28.265C23.4461 28.3593 23.6531 28.4976 23.8274 28.6719L28.1249 32.9732L38.0474 23.0469C38.2216 22.8723 38.4285 22.7338 38.6563 22.6393C38.8841 22.5447 39.1283 22.4961 39.3749 22.4961C39.6216 22.4961 39.8658 22.5447 40.0936 22.6393C40.3213 22.7338 40.5283 22.8723 40.7024 23.0469Z" fill="#60B15B"/>
                                                <path d="M11.25 0H48.75C50.7391 0 52.6468 0.790176 54.0533 2.1967C55.4598 3.60322 56.25 5.51088 56.25 7.5V52.5C56.25 54.4891 55.4598 56.3968 54.0533 57.8033C52.6468 59.2098 50.7391 60 48.75 60H11.25C9.26088 60 7.35322 59.2098 5.9467 57.8033C4.54018 56.3968 3.75 54.4891 3.75 52.5V48.75H7.5V52.5C7.5 53.4946 7.89509 54.4484 8.59835 55.1516C9.30161 55.8549 10.2554 56.25 11.25 56.25H48.75C49.7446 56.25 50.6984 55.8549 51.4016 55.1516C52.1049 54.4484 52.5 53.4946 52.5 52.5V7.5C52.5 6.50544 52.1049 5.55161 51.4016 4.84835C50.6984 4.14509 49.7446 3.75 48.75 3.75H11.25C10.2554 3.75 9.30161 4.14509 8.59835 4.84835C7.89509 5.55161 7.5 6.50544 7.5 7.5V11.25H3.75V7.5C3.75 5.51088 4.54018 3.60322 5.9467 2.1967C7.35322 0.790176 9.26088 0 11.25 0Z" fill="#60B15B"/>
                                                <path d="M3.75 18.75V16.875C3.75 16.3777 3.94754 15.9008 4.29917 15.5492C4.65081 15.1975 5.12772 15 5.625 15C6.12228 15 6.59919 15.1975 6.95083 15.5492C7.30246 15.9008 7.5 16.3777 7.5 16.875V18.75H9.375C9.87228 18.75 10.3492 18.9475 10.7008 19.2992C11.0525 19.6508 11.25 20.1277 11.25 20.625C11.25 21.1223 11.0525 21.5992 10.7008 21.9508C10.3492 22.3025 9.87228 22.5 9.375 22.5H1.875C1.37772 22.5 0.900806 22.3025 0.549175 21.9508C0.197544 21.5992 0 21.1223 0 20.625C0 20.1277 0.197544 19.6508 0.549175 19.2992C0.900806 18.9475 1.37772 18.75 1.875 18.75H3.75ZM3.75 30V28.125C3.75 27.6277 3.94754 27.1508 4.29917 26.7992C4.65081 26.4475 5.12772 26.25 5.625 26.25C6.12228 26.25 6.59919 26.4475 6.95083 26.7992C7.30246 27.1508 7.5 27.6277 7.5 28.125V30H9.375C9.87228 30 10.3492 30.1975 10.7008 30.5492C11.0525 30.9008 11.25 31.3777 11.25 31.875C11.25 32.3723 11.0525 32.8492 10.7008 33.2008C10.3492 33.5525 9.87228 33.75 9.375 33.75H1.875C1.37772 33.75 0.900806 33.5525 0.549175 33.2008C0.197544 32.8492 0 32.3723 0 31.875C0 31.3777 0.197544 30.9008 0.549175 30.5492C0.900806 30.1975 1.37772 30 1.875 30H3.75ZM3.75 41.25V39.375C3.75 38.8777 3.94754 38.4008 4.29917 38.0492C4.65081 37.6975 5.12772 37.5 5.625 37.5C6.12228 37.5 6.59919 37.6975 6.95083 38.0492C7.30246 38.4008 7.5 38.8777 7.5 39.375V41.25H9.375C9.87228 41.25 10.3492 41.4475 10.7008 41.7992C11.0525 42.1508 11.25 42.6277 11.25 43.125C11.25 43.6223 11.0525 44.0992 10.7008 44.4508C10.3492 44.8025 9.87228 45 9.375 45H1.875C1.37772 45 0.900806 44.8025 0.549175 44.4508C0.197544 44.0992 0 43.6223 0 43.125C0 42.6277 0.197544 42.1508 0.549175 41.7992C0.900806 41.4475 1.37772 41.25 1.875 41.25H3.75Z" fill="#60B15B"/>
                                                </svg>
                                          <p>Diproses</p>
                                        </div>
                                        <div class="timeline-line active"></div>
                                        <div class="timeline-step active">
                                            <svg class="ml-6" width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg"alt="Dijemput Kurir">
                                                <g clip-path="url(#clip0_5665_1299)">
                                                <path d="M30.6975 4.22947C30.2498 4.04763 29.7502 4.04763 29.3025 4.22947L6.9225 13.3017L15.9375 16.9541L39.015 7.60067L30.6975 4.22947ZM44.0625 9.64923L20.985 19.0027L30 22.6551L53.0775 13.3017L44.0625 9.64923ZM56.25 16.1104L31.875 25.9921V56.1011L56.25 46.2193V16.1104ZM28.125 56.1049V25.9883L3.75 16.1104V46.2231L28.125 56.1049ZM27.9113 0.69864C29.2521 0.155141 30.7479 0.155141 32.0888 0.69864L58.8225 11.5382C59.1701 11.6793 59.468 11.9228 59.6779 12.2371C59.8877 12.5514 59.9999 12.9222 60 13.3017V46.2231C59.9995 46.9826 59.7746 47.7245 59.3541 48.3532C58.9337 48.9818 58.3371 49.4684 57.6413 49.7502L30.6975 60.6733C30.2498 60.8551 29.7502 60.8551 29.3025 60.6733L2.3625 49.7502C1.66594 49.469 1.06853 48.9827 0.647408 48.354C0.226281 47.7253 0.000773735 46.983 0 46.2231L0 13.3017C8.71498e-05 12.9222 0.112289 12.5514 0.322151 12.2371C0.532014 11.9228 0.829923 11.6793 1.1775 11.5382L27.9113 0.69864Z" fill="#595959"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_5665_1299">
                                                <rect width="60" height="60.8108" fill="white"/>
                                                </clipPath>
                                                </defs>
                                                </svg>
                                                
                                          <p class="ml-2">Dijemput Kurir</p>
                                        </div>
                                        <div class="timeline-line"></div>
                                        <div class="timeline-step">
                                            <svg class="ml-8" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" alt="Menuju Dropbox">
                                                <g clip-path="url(#clip0_5665_1302)">
                                                <path d="M8.18965e-09 13.125C8.18965e-09 11.6332 0.592632 10.2024 1.64752 9.14752C2.70242 8.09263 4.13316 7.5 5.625 7.5H39.375C40.8668 7.5 42.2976 8.09263 43.3525 9.14752C44.4074 10.2024 45 11.6332 45 13.125V18.75H48.825C49.6678 18.7508 50.4996 18.9409 51.259 19.3063C52.0185 19.6717 52.6861 20.2031 53.2125 20.8613L58.7663 27.7988C59.5653 28.7969 60.0005 30.0376 60 31.3163V39.375C60 40.8668 59.4074 42.2976 58.3525 43.3525C57.2976 44.4074 55.8668 45 54.375 45H52.5C52.5 46.9891 51.7098 48.8968 50.3033 50.3033C48.8968 51.7098 46.9891 52.5 45 52.5C43.0109 52.5 41.1032 51.7098 39.6967 50.3033C38.2902 48.8968 37.5 46.9891 37.5 45H18.75C18.7522 45.9997 18.5544 46.9897 18.1685 47.9119C17.7825 48.8341 17.216 49.6698 16.5024 50.3699C15.7888 51.07 14.9425 51.6204 14.0131 51.9887C13.0837 52.357 12.0901 52.5357 11.0906 52.5145C10.0911 52.4932 9.106 52.2724 8.19311 51.8649C7.28023 51.4575 6.45801 50.8716 5.77481 50.1418C5.0916 49.412 4.56119 48.553 4.21475 47.6152C3.86832 46.6775 3.71286 45.6799 3.7575 44.6813C2.65893 44.2946 1.70746 43.5765 1.03442 42.626C0.361371 41.6756 -6.28198e-05 40.5396 8.18965e-09 39.375L8.18965e-09 13.125ZM4.8525 41.085C5.53122 39.9759 6.48663 39.0623 7.62498 38.4339C8.76332 37.8055 10.0455 37.4838 11.3457 37.5004C12.6459 37.5171 13.9194 37.8715 15.0413 38.5288C16.1632 39.1862 17.0949 40.1239 17.745 41.25H38.505C39.1632 40.11 40.11 39.1632 41.25 38.505V13.125C41.25 12.6277 41.0525 12.1508 40.7008 11.7992C40.3492 11.4475 39.8723 11.25 39.375 11.25H5.625C5.12772 11.25 4.65081 11.4475 4.29917 11.7992C3.94754 12.1508 3.75 12.6277 3.75 13.125V39.375C3.74971 39.7359 3.85357 40.0892 4.04914 40.3925C4.2447 40.6959 4.52365 40.9363 4.8525 41.085ZM45 37.5C46.3165 37.5 47.6098 37.8466 48.7499 38.5049C49.89 39.1631 50.8368 40.1099 51.495 41.25H54.375C54.8723 41.25 55.3492 41.0525 55.7008 40.7008C56.0525 40.3492 56.25 39.8723 56.25 39.375V31.3125C56.2492 30.887 56.1038 30.4744 55.8375 30.1425L50.2875 23.205C50.1121 22.9854 49.8897 22.808 49.6365 22.686C49.3834 22.564 49.106 22.5004 48.825 22.5H45V37.5ZM11.25 41.25C10.2554 41.25 9.30161 41.6451 8.59835 42.3484C7.89509 43.0516 7.5 44.0054 7.5 45C7.5 45.9946 7.89509 46.9484 8.59835 47.6517C9.30161 48.3549 10.2554 48.75 11.25 48.75C12.2446 48.75 13.1984 48.3549 13.9017 47.6517C14.6049 46.9484 15 45.9946 15 45C15 44.0054 14.6049 43.0516 13.9017 42.3484C13.1984 41.6451 12.2446 41.25 11.25 41.25ZM45 41.25C44.0054 41.25 43.0516 41.6451 42.3484 42.3484C41.6451 43.0516 41.25 44.0054 41.25 45C41.25 45.9946 41.6451 46.9484 42.3484 47.6517C43.0516 48.3549 44.0054 48.75 45 48.75C45.9946 48.75 46.9484 48.3549 47.6517 47.6517C48.3549 46.9484 48.75 45.9946 48.75 45C48.75 44.0054 48.3549 43.0516 47.6517 42.3484C46.9484 41.6451 45.9946 41.25 45 41.25Z" fill="#595959"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_5665_1302">
                                                <rect width="60" height="60" fill="white"/>
                                                </clipPath>
                                                </defs>
                                                </svg>
                                          <p class="ml-2">Menuju Dropbox</p>
                                        </div>
                                        <div class="timeline-line"></div>
                                        <div class="timeline-step">
                                            <svg class="ml-6" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" alt="Sudah Sampai">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M38.8274 23.0469C39.002 23.2211 39.1406 23.428 39.2351 23.6558C39.3296 23.8836 39.3783 24.1278 39.3783 24.3744C39.3783 24.6211 39.3296 24.8653 39.2351 25.0931C39.1406 25.3209 39.002 25.5278 38.8274 25.7019L27.5774 36.9519C27.4033 37.1266 27.1963 37.2651 26.9686 37.3596C26.7408 37.4541 26.4966 37.5028 26.2499 37.5028C26.0033 37.5028 25.7591 37.4541 25.5313 37.3596C25.3035 37.2651 25.0966 37.1266 24.9224 36.9519L19.2974 31.3269C19.1231 31.1526 18.9848 30.9457 18.8905 30.7179C18.7961 30.4901 18.7476 30.246 18.7476 29.9994C18.7476 29.7529 18.7961 29.5088 18.8905 29.281C18.9848 29.0532 19.1231 28.8463 19.2974 28.6719C19.4718 28.4976 19.6787 28.3593 19.9065 28.265C20.1343 28.1706 20.3784 28.1221 20.6249 28.1221C20.8715 28.1221 21.1156 28.1706 21.3434 28.265C21.5711 28.3593 21.7781 28.4976 21.9524 28.6719L26.2499 32.9732L36.1724 23.0469C36.3466 22.8723 36.5535 22.7338 36.7813 22.6393C37.0091 22.5447 37.2533 22.4961 37.4999 22.4961C37.7466 22.4961 37.9908 22.5447 38.2186 22.6393C38.4463 22.7338 38.6533 22.8723 38.8274 23.0469Z" fill="#595959"/>
                                                <path d="M38.5237 9.42464L35.0699 5.88464L37.7512 3.26714L40.0837 5.65589L43.4212 5.61464C44.8659 5.59754 46.2994 5.86948 47.6374 6.41447C48.9755 6.95946 50.1911 7.76649 51.2127 8.78811C52.2343 9.80973 53.0413 11.0253 53.5863 12.3634C54.1313 13.7014 54.4033 15.135 54.3862 16.5796L54.3487 19.9171L56.7337 22.2496C57.7666 23.259 58.5874 24.4647 59.1478 25.7958C59.7082 27.1269 59.9969 28.5566 59.9969 30.0009C59.9969 31.4452 59.7082 32.8749 59.1478 34.206C58.5874 35.5371 57.7666 36.7428 56.7337 37.7521L54.3449 40.0846L54.3862 43.4221C54.4033 44.8668 54.1313 46.3004 53.5863 47.6384C53.0413 48.9765 52.2343 50.1921 51.2127 51.2137C50.1911 52.2353 48.9755 53.0423 47.6374 53.5873C46.2994 54.1323 44.8659 54.4042 43.4212 54.3871L40.0837 54.3496L37.7512 56.7346C36.7418 57.7676 35.5361 58.5884 34.205 59.1488C32.8739 59.7092 31.4442 59.9979 29.9999 59.9979C28.5556 59.9979 27.126 59.7092 25.7948 59.1488C24.4637 58.5884 23.2581 57.7676 22.2487 56.7346L19.9162 54.3459L16.5787 54.3871C15.134 54.4042 13.7005 54.1323 12.3624 53.5873C11.0243 53.0423 9.80875 52.2353 8.78713 51.2137C7.76551 50.1921 6.95848 48.9765 6.41349 47.6384C5.8685 46.3004 5.59656 44.8668 5.61366 43.4221L5.65116 40.0846L3.26616 37.7521C2.23319 36.7428 1.41239 35.5371 0.851998 34.206C0.291607 32.8749 0.00292969 31.4452 0.00292969 30.0009C0.00292969 28.5566 0.291607 27.1269 0.851998 25.7958C1.41239 24.4647 2.23319 23.259 3.26616 22.2496L5.65491 19.9171L5.61366 16.5796C5.59656 15.135 5.8685 13.7014 6.41349 12.3634C6.95848 11.0253 7.76551 9.80973 8.78713 8.78811C9.80875 7.76649 11.0243 6.95946 12.3624 6.41447C13.7005 5.86948 15.134 5.59754 16.5787 5.61464L19.9162 5.65214L22.2487 3.26714C23.2581 2.23416 24.4637 1.41337 25.7948 0.852975C27.126 0.292584 28.5556 0.00390625 29.9999 0.00390625C31.4442 0.00390625 32.8739 0.292584 34.205 0.852975C35.5361 1.41337 36.7418 2.23416 37.7512 3.26714L35.0699 5.88464C34.4098 5.20884 33.6212 4.67183 32.7505 4.3052C31.8798 3.93856 30.9446 3.74969 29.9999 3.74969C29.0552 3.74969 28.12 3.93856 27.2493 4.3052C26.3786 4.67183 25.5901 5.20884 24.9299 5.88464L21.4799 9.42464L16.5299 9.36464C15.5856 9.35408 14.6487 9.53236 13.7742 9.88899C12.8997 10.2456 12.1054 10.7734 11.4377 11.4414C10.7701 12.1093 10.2428 12.904 9.88657 13.7786C9.5304 14.6533 9.35261 15.5903 9.36366 16.5346L9.42366 21.4771L5.88366 24.9309C5.20786 25.591 4.67086 26.3796 4.30422 27.2503C3.93758 28.121 3.74871 29.0562 3.74871 30.0009C3.74871 30.9456 3.93758 31.8808 4.30422 32.7515C4.67086 33.6222 5.20786 34.4107 5.88366 35.0709L9.42366 38.5209L9.36366 43.4709C9.3531 44.4152 9.53138 45.3521 9.88801 46.2266C10.2446 47.1011 10.7725 47.8954 11.4404 48.5631C12.1084 49.2307 12.903 49.7581 13.7777 50.1142C14.6523 50.4704 15.5893 50.6482 16.5337 50.6371L21.4762 50.5771L24.9299 54.1171C25.5901 54.7929 26.3786 55.3299 27.2493 55.6966C28.12 56.0632 29.0552 56.2521 29.9999 56.2521C30.9446 56.2521 31.8798 56.0632 32.7505 55.6966C33.6212 55.3299 34.4098 54.7929 35.0699 54.1171L38.5199 50.5771L43.4699 50.6371C44.4142 50.6477 45.3512 50.4694 46.2256 50.1128C47.1001 49.7562 47.8945 49.2284 48.5621 48.5604C49.2297 47.8924 49.7571 47.0978 50.1133 46.2231C50.4694 45.3485 50.6472 44.4115 50.6362 43.4671L50.5762 38.5246L54.1162 35.0709C54.792 34.4107 55.329 33.6222 55.6956 32.7515C56.0622 31.8808 56.2511 30.9456 56.2511 30.0009C56.2511 29.0562 56.0622 28.121 55.6956 27.2503C55.329 26.3796 54.792 25.591 54.1162 24.9309L50.5762 21.4809L50.6362 16.5309C50.6467 15.5866 50.4684 14.6496 50.1118 13.7752C49.7552 12.9007 49.2274 12.1063 48.5594 11.4387C47.8915 10.7711 47.0968 10.2437 46.2222 9.88755C45.3475 9.53137 44.4105 9.35359 43.4662 9.36464L38.5237 9.42464Z" fill="#595959"/>
                                                </svg>
                                          <p>Sudah Sampai</p>
                                        </div>
                                        
                                      </div>
                                      <div class="timeline-line mt-8 mb-8"></div>
                                      
                                      <!-- Content -->
                                      <div class="content">
                                        <div class="content-column ">
                                          <h3>ID Pelacakan</h3>
                                          <p>E-000000989898</p>
                                  
                                          <h3>Lokasi Dropbox Tujuan</h3>
                                          <p>Jalan Kapten Abdul Hamid No.86, RT 3/RW 1, Kelurahan Ledeng, Cidadap, Kota Bandung, Jawa Barat, 40142</p>
                                  
                                          <h3>Status</h3>
                                          <p>Diproses</p>
                                        </div>
                                        <div class="content-column">
                                          <h3>Detail Pelacakan</h3>
                                          <p><strong>17.20 WIB, 9 Des 2024</strong></p>
                                          <p>Persiapan - Lorem ipsum dolor sit amet consectetur.</p>
                                          <p><strong>17.20 WIB, 9 Des 2024</strong></p>
                                          <p>Persiapan - Lorem ipsum dolor sit amet consectetur.</p>
                                        </div>
                                      </div>
                                  
                                      <!-- Close Button -->
                                      <button id="closePopupBtn" class="close-btn">Tutup</button>
                                    </div>
                                  </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
    
                
            </div>
        </div>
    </div>

    <script>
         // Element selectors
    const openPopupBtn = document.getElementById('openPopupBtn');
    const closePopupBtn = document.getElementById('closePopupBtn');
    const popup = document.getElementById('popup');
    const overlay = document.getElementById('overlay');

    // Show pop-up
    openPopupBtn.addEventListener('click', () => {
      popup.style.display = 'block';
      overlay.style.display = 'block';
    });

    // Hide pop-up
    closePopupBtn.addEventListener('click', () => {
      popup.style.display = 'none';
      overlay.style.display = 'none';
    });

    // Hide pop-up when clicking on the overlay
    overlay.addEventListener('click', () => {
      popup.style.display = 'none';
      overlay.style.display = 'none';
    });
        // Define the changePage function globally
        function changePage(page) {
            $('#masyarakatTable').DataTable().page(page).draw('page');
        }

        document.addEventListener('DOMContentLoaded', () => {
            $(document).ready(function() {
        var table = $('#masyarakatTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("admin.penjemputan-sampah.tracking.index") }}',
                type: 'GET'
            },
            columns: [

            ],
            order: [[0, 'asc']], // Sort by id_pelacakan ascending by default
            dom: 't'
        });

                

                
            });
        });


        

    


        
    </script>
@endsection
