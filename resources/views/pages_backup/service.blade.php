@extends('layouts.layout')

<?php
    $title = 'Our Services';
    $subTitle = 'Home';
?>

@section('content')
    <!-- service area start -->
    <section class="inner_service-area pt-140 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left">
                    <div class="inner_service-item mb-30">
                        <div class="inner_service-item-icon">
                            <svg width="55" height="52" viewBox="0 0 55 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M26.375 0.351841C22.8331 1.61848 22.3405 6.2628 25.554 8.25658C26.633 8.93681 26.7034 9.03063 26.7034 9.99234V11.0009L18.4468 11.0713C9.29887 11.1417 9.48652 11.1182 7.75076 12.7602C6.48413 13.933 6.20265 14.6601 6.06192 17.2403L5.94464 19.5859L3.99777 19.7032C2.14473 19.8205 2.004 19.8674 1.34722 20.5945L0.666992 21.3451V27.045C0.666992 33.3547 0.690448 33.5189 2.2151 34.1522C2.63731 34.3399 3.69284 34.4806 4.53726 34.4806H6.06192V37.1077C6.06192 40.1101 6.3903 41.0952 7.70385 42.3853C9.3927 44.0273 8.8532 43.9569 22.3405 44.0976L34.5143 44.2149L36.7895 47.8506C39.3228 51.8851 39.8388 52.3308 41.3869 51.8382C42.7474 51.3925 42.8881 50.9468 42.8881 47.358V44.168L44.061 44.0273C45.5152 43.8396 46.5942 43.347 47.5794 42.3853C48.8929 41.0952 49.2213 40.1101 49.2213 37.1077V34.4806H50.746C51.5904 34.4806 52.6459 34.3399 53.0681 34.1522C54.5928 33.5189 54.6162 33.3547 54.6162 27.045V21.3451L53.936 20.5945C53.3027 19.8908 53.1385 19.8439 51.3089 19.7032L49.3386 19.5859L49.2213 17.2403C49.0806 14.6601 48.7991 13.933 47.5325 12.7602C45.8202 11.1182 45.9844 11.1417 36.9772 11.0713L28.8144 11.0009V9.99234C28.8144 9.03063 28.8848 8.93681 29.9638 8.25658C32.5674 6.66156 32.8723 3.23695 30.6206 1.24318C29.823 0.539494 28.486 0 27.6416 0C27.454 0.0234566 26.891 0.164192 26.375 0.351841ZM29.0255 2.95548C30.5033 4.19866 29.6823 6.56773 27.7589 6.56773C25.8355 6.56773 25.0145 4.19866 26.4923 2.95548C26.891 2.62709 27.454 2.34562 27.7589 2.34562C28.0638 2.34562 28.6268 2.62709 29.0255 2.95548ZM45.3745 13.9799C45.7263 14.2379 46.2424 14.7539 46.5004 15.1058C46.993 15.7391 46.993 15.9971 46.993 27.561C46.993 39.1718 46.993 39.3829 46.5004 40.0397C45.656 41.1656 44.577 41.752 43.3338 41.752C42.3956 41.752 42.0437 41.8693 41.4339 42.4322L40.6598 43.1125L40.5425 46.2322L40.4252 49.3753L38.3376 45.9741C37.1883 44.0976 36.0858 42.3853 35.8982 42.1508C35.5698 41.7755 34.655 41.752 23.1849 41.752H10.8235L10.0495 41.2125C9.62726 40.9311 9.04085 40.3916 8.78284 40.0397C8.31371 39.3829 8.29026 39.1015 8.21989 28.4289C8.17297 22.4007 8.21989 17.0292 8.29026 16.4897C8.45445 15.3403 9.34578 14.1675 10.4013 13.6984C10.9643 13.4404 14.295 13.3935 27.9231 13.4404C44.4832 13.4873 44.7412 13.4873 45.3745 13.9799ZM5.94464 27.0919V32.0177L4.49035 32.0881L3.01261 32.1584V27.0919V22.0254L4.49035 22.0957L5.94464 22.1661V27.0919ZM52.2706 27.0919V32.1584L50.8163 32.0881L49.3386 32.0177L49.2682 27.3499C49.2213 24.7932 49.2448 22.5414 49.3151 22.3537C49.409 22.1426 49.8781 22.0488 50.8633 22.0488H52.2706V27.0919Z" fill="currentColor"/>
                                <path d="M19.5715 21.9316C17.2963 22.7291 15.9358 25.7315 17.6716 26.1772C18.4925 26.3883 18.774 26.2241 19.3135 25.192C20.2048 23.4797 21.9171 23.5735 22.785 25.4031C23.1134 26.1068 23.3011 26.271 23.8875 26.271C26.1862 26.271 24.6615 22.5415 22.0813 21.8378C20.9554 21.5094 20.6974 21.5328 19.5715 21.9316Z" fill="currentColor"/>
                                <path d="M33.1546 21.9315C31.9583 22.3538 30.762 23.6438 30.5509 24.7228C30.3633 25.7549 30.7386 26.2709 31.6534 26.2709C32.1929 26.2709 32.404 26.1067 32.7324 25.4031C33.6237 23.5266 35.2891 23.4796 36.2742 25.2858C36.7199 26.0833 36.9545 26.2709 37.494 26.2709C38.9952 26.2709 38.9248 24.1364 37.3767 22.776C36.6261 22.1192 35.2656 21.5797 34.4447 21.5797C34.257 21.6032 33.6706 21.7439 33.1546 21.9315Z" fill="currentColor"/>
                                <path d="M21.4026 34.3633C21.0507 34.9028 21.0507 34.9966 21.4026 35.5361C22.7396 37.5768 32.7788 37.5768 34.1158 35.5361C34.4677 34.9966 34.4677 34.9028 34.0924 34.3399C33.6701 33.6831 33.7171 33.6831 31.2776 34.3868C29.2369 34.9732 25.8592 34.9263 23.8889 34.2695C21.9655 33.6596 21.8717 33.6596 21.4026 34.3633Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="inner_service-item-content">
                            <h5 class="inner_service-item-content-title"><a href="#">AI-Powered Chatbots</a></h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting is One of te best AI.</p>
                            <a href="#" class="inner_service-item-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                    <div class="inner_service-item mb-30">
                        <div class="inner_service-item-icon">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.8324 0.172478C19.5251 0.311714 18.9665 0.757263 18.5754 1.17496L17.8771 1.92682L17.7933 10.6429L17.7095 19.3867L9.77654 19.4703L1.81564 19.5538L0.921788 20.4728L0 21.3639V32.2241V43.0843L0.893855 43.9754C1.73184 44.8108 1.98324 44.8944 3.91061 44.9779L6.00559 45.0893V47.2335C6.00559 50.8257 6.53631 50.8814 10.0838 47.6233L12.7374 45.1728L21.5084 45.0336L30.3073 44.8944L31.2011 43.9754L32.1229 43.0843L32.2067 34.3126L32.2905 25.5409H34.7207H37.1508L39.8045 28.0471C43.4078 31.4165 43.9944 31.3608 43.9944 27.7408V25.5966L46.0894 25.4852C48.0168 25.4016 48.2682 25.3181 49.1061 24.4827L50 23.5916V12.7314V1.87113L49.0782 0.980034L48.1844 0.0610924L34.2737 0.0053978C26.648 -0.0224495 20.1397 0.0610924 19.8324 0.172478ZM47.5698 2.48376C48.0447 2.95715 48.0447 22.5056 47.5698 22.979C47.3743 23.1739 46.3408 23.3131 44.8324 23.3131C43.324 23.3131 42.2905 23.4524 42.095 23.6473C41.8994 23.8422 41.7598 24.5941 41.7598 25.3738V26.7383L39.9721 25.0396L38.1844 23.3131H29.4134C22.9609 23.3131 20.5587 23.2296 20.3073 22.979C19.8324 22.5056 19.8324 2.95715 20.3073 2.48376C20.7821 2.01036 47.095 2.01036 47.5698 2.48376ZM17.8492 22.7005C17.933 23.3688 18.324 24.065 18.8547 24.5662L19.7207 25.4016L24.8883 25.4852L30.0279 25.5687V33.8671C30.0279 39.9376 29.9441 42.2211 29.6927 42.4717C29.4413 42.7223 27.0391 42.8059 20.5866 42.8059H11.8156L10.0279 44.5324L8.24022 46.231V44.8665C8.24022 44.0868 8.10056 43.3349 7.90503 43.14C7.7095 42.9451 6.67598 42.8059 5.1676 42.8059C3.65922 42.8059 2.6257 42.6666 2.43017 42.4717C1.95531 41.9983 1.95531 22.4499 2.43017 21.9765C2.68156 21.7259 4.80447 21.6423 10.2235 21.6423H17.6536L17.8492 22.7005Z" fill="currentColor"/>
                                <path d="M35.4151 4.55687C35.2063 4.76572 35.0571 5.4221 35.0571 6.04866V7.15258L31.7453 7.24209C28.9407 7.3316 28.344 7.4211 28.0755 7.83881C27.8368 8.22667 27.8368 8.52503 28.0755 8.88306C28.344 9.30076 28.9109 9.44994 30.5519 9.50961C31.8646 9.56928 32.6702 9.71846 32.6702 9.92731C32.6702 10.1063 33.0879 11.1804 33.625 12.3142C34.52 14.2833 34.5499 14.3728 34.0128 14.9397C33.7145 15.2679 32.5807 15.9541 31.5066 16.4614C30.4325 16.9686 29.3286 17.4758 29.0899 17.5951C28.4634 17.9233 28.3739 18.9377 28.9407 19.4151C29.7761 20.1013 33.1476 18.7885 35.2063 16.9984L36.2505 16.0735L37.2948 16.9984C39.3534 18.7885 42.7249 20.1013 43.5603 19.4151C44.1272 18.9377 44.0377 17.9233 43.4111 17.5951C43.1724 17.4758 42.2177 17.0282 41.3226 16.6404C40.4275 16.2525 39.2639 15.5663 38.7269 15.1187L37.802 14.343L38.4882 13.0601C38.8462 12.3738 39.3236 11.2998 39.5325 10.703L39.8606 9.59912L41.979 9.50961C43.62 9.44994 44.157 9.30076 44.4255 8.88306C44.6642 8.52503 44.6642 8.22667 44.4255 7.83881C44.157 7.4211 43.5603 7.3316 40.7557 7.24209L37.4439 7.15258V6.04866C37.4439 4.85522 37.0262 4.19884 36.2505 4.19884C35.982 4.19884 35.624 4.34802 35.4151 4.55687ZM37.4439 9.68863C37.4439 10.1362 36.4892 11.9561 36.2505 11.9561C36.0118 11.9561 35.0571 10.1362 35.0571 9.68863C35.0571 9.62895 35.5941 9.56928 36.2505 9.56928C36.9069 9.56928 37.4439 9.62895 37.4439 9.68863Z" fill="currentColor"/>
                                <path d="M15.8729 26.1876C13.9336 29.3204 8.77199 39.196 8.8615 39.6137C8.98084 40.2403 9.81625 40.7475 10.3831 40.5088C10.6218 40.4193 11.4572 39.196 12.2329 37.7938L13.6352 35.2279H17.1559H20.6765L22.0191 37.6744C22.7352 39.017 23.5407 40.2701 23.8092 40.4193C24.406 40.8072 25.301 40.3596 25.4502 39.6137C25.5099 39.3452 24.1076 36.481 22.3473 33.2289C18.2001 25.5909 17.8719 25.0837 17.1559 25.0837C16.7978 25.0837 16.2906 25.5312 15.8729 26.1876ZM18.2001 30.663C18.7073 31.5879 19.1549 32.4532 19.1847 32.6023C19.2444 32.7217 18.3195 32.841 17.1559 32.841C15.9923 32.841 15.0673 32.7217 15.127 32.6023C15.4254 31.8266 17.0365 28.9624 17.1559 28.9624C17.2454 28.9624 17.7227 29.7381 18.2001 30.663Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="inner_service-item-content">
                            <h5 class="inner_service-item-content-title"><a href="#">Embracing Multilingual
                                Support</a></h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                            <a href="#" class="inner_service-item-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.1">
                    <div class="inner_service-item mb-30">
                        <div class="inner_service-item-icon">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.1113 0.135796C23.4863 0.32151 22.7441 1.0155 22.4609 1.66062C22.1875 2.28619 22.1582 3.25387 22.4121 3.83056C22.627 4.33884 23.3496 5.09148 23.8281 5.30651L24.2188 5.48246V8.60052V11.7088H23.9063C23.291 11.7088 21.8164 12.0118 20.8008 12.3539C19.4922 12.7938 18.1055 13.5171 16.9824 14.3675L16.0742 15.0419L13.9063 12.8622L11.7285 10.6825L11.9238 10.096C12.4121 8.67872 11.582 7.0757 10.166 6.6554C8.74024 6.24487 7.36328 6.85089 6.75781 8.18022C6.42578 8.89376 6.47461 9.99828 6.86523 10.6629C7.53906 11.8163 8.88672 12.3344 10.1074 11.9141L10.6934 11.7186L12.8711 13.8983L15.0488 16.0683L14.375 16.9773C13.5254 18.1014 12.8027 19.4893 12.3633 20.7991C12.0215 21.8157 11.7188 23.2916 11.7188 23.8976V24.2202H8.61328H5.49805L5.32227 23.8292C5.10742 23.3503 4.35547 22.627 3.84766 22.4119C3.27148 22.1578 2.30469 22.1871 1.67969 22.4608C0.712891 22.8811 0 23.9661 0 25.0022C0 26.0383 0.712891 27.1232 1.67969 27.5435C2.30469 27.8172 3.27148 27.8465 3.84766 27.5924C4.35547 27.3774 5.10742 26.6541 5.32227 26.1751L5.49805 25.7841H8.61328H11.7188V26.0969C11.7188 26.7127 12.0215 28.1887 12.3633 29.2052C12.8027 30.5248 13.5254 31.903 14.3848 33.0368L15.0586 33.9458L12.832 36.106L10.6055 38.2662L10.2539 38.1196C9.75586 37.9045 8.73047 37.9338 8.19336 38.1684C7.12891 38.6376 6.54297 39.5369 6.54297 40.6805C6.54297 42.2542 7.71484 43.4662 9.23828 43.476C10.4102 43.476 11.2891 42.9482 11.7871 41.9316C12.1191 41.2474 12.1582 40.2211 11.875 39.6737L11.6992 39.3414L13.8867 37.1519L16.0742 34.9624L17.002 35.6466C18.6621 36.8977 20.7324 37.7872 22.793 38.1489C23.2715 38.2271 23.7891 38.2955 23.9355 38.2955H24.2188V41.4038V44.5219L23.8184 44.6978C22.0313 45.5091 21.6699 47.9527 23.1543 49.2821C24.9512 50.8948 27.7832 49.6144 27.7637 47.1903C27.7539 46.1347 27.1191 45.1279 26.1816 44.6978L25.7813 44.5219V41.4038V38.2955H26.0645C26.2109 38.2955 26.7285 38.2271 27.207 38.1489C29.2773 37.7872 31.3672 36.888 32.9981 35.6466L33.916 34.9526L36.1035 37.1421L38.3008 39.3414L38.125 39.6737C38.0078 39.8985 37.9492 40.2309 37.9492 40.7C37.9395 41.2767 37.9883 41.482 38.2324 41.9609C39.1211 43.7008 41.416 44.0136 42.7344 42.5767C43.3008 41.9609 43.4961 41.4038 43.4375 40.5045C43.3691 39.3902 42.832 38.6278 41.7969 38.1684C41.2695 37.9338 40.2441 37.9143 39.7461 38.1293L39.4043 38.2759L37.1973 36.0767L34.9902 33.8774L35.6445 33.0075C36.4746 31.903 37.1973 30.515 37.6367 29.2052C37.9785 28.1789 38.2813 26.7322 38.2813 26.1165V25.7841H41.4063H44.5313L44.668 26.1165C44.8926 26.6443 45.5566 27.2992 46.1133 27.5435C48.3106 28.4917 50.6152 26.351 49.8438 24.0931C49.6289 23.4578 48.9551 22.7345 48.3203 22.4608C47.6953 22.1871 46.7285 22.1578 46.1523 22.4119C45.6445 22.627 44.8926 23.3503 44.6777 23.8292L44.502 24.2202H41.3867H38.2813V23.8879C38.2813 23.3112 37.9004 21.5224 37.5879 20.6232C37.168 19.4209 36.416 18.0232 35.625 16.9773L34.9512 16.0683L37.1289 13.8983L39.3066 11.7186L39.8926 11.9141C41.1133 12.3344 42.4609 11.8163 43.1348 10.6629C43.5254 9.99828 43.5742 8.89376 43.2422 8.18022C42.959 7.56443 42.5293 7.09525 41.9531 6.79224C41.6309 6.62607 41.3867 6.5772 40.7227 6.5772C40.0098 6.5772 39.8242 6.6163 39.3945 6.84111C38.1934 7.46668 37.6367 8.84489 38.0762 10.096L38.2715 10.6825L36.0938 12.8622L33.9258 15.0419L33.0176 14.3675C31.8945 13.5171 30.5078 12.7938 29.1992 12.3539C28.1836 12.0118 26.709 11.7088 26.1035 11.7088H25.7813V8.58097V5.46291L26.2012 5.27719C26.6895 5.06215 27.3633 4.34861 27.5977 3.82079C27.6855 3.61552 27.7539 3.17567 27.7637 2.81401C27.7832 0.888435 25.9668 -0.440899 24.1113 0.135796ZM25.8398 1.86589C26.5137 2.48168 26.3574 3.53733 25.5176 3.90876C24.1797 4.49523 23.0859 2.80424 24.1797 1.84634C24.4629 1.5922 24.5996 1.54333 25 1.54333C25.4199 1.54333 25.5469 1.5922 25.8398 1.86589ZM9.81445 8.13135C10.2539 8.31706 10.5469 8.80579 10.5469 9.35316C10.5469 9.71482 10.4883 9.83212 10.166 10.1547C9.84375 10.4772 9.72656 10.5359 9.36524 10.5359C8.53516 10.5359 7.91992 9.85166 8.04688 9.08925C8.10547 8.70805 8.31055 8.44413 8.74024 8.18022C9.0918 7.95541 9.36524 7.94563 9.81445 8.13135ZM41.5723 8.42458C41.9727 8.86444 42.0606 9.19677 41.8848 9.69527C41.6895 10.272 41.2109 10.5652 40.5859 10.5066C39.6289 10.4186 39.1406 9.43136 39.6484 8.60052C40.0684 7.90654 41.0254 7.81857 41.5723 8.42458ZM26.9531 13.3314C31.9434 14.1915 35.8008 18.0525 36.6602 23.0473C37.8906 30.212 32.2852 36.8293 25 36.8293C18.4668 36.8293 13.1836 31.5413 13.1836 25.0022C13.1836 19.245 17.3145 14.3382 22.998 13.3314C24.0723 13.1457 25.8496 13.1457 26.9531 13.3314ZM3.36914 23.8879C3.81836 24.0931 4.04297 24.4743 4.04297 25.0022C4.04297 25.8037 3.4082 26.351 2.59766 26.2435C1.99219 26.1556 1.5625 25.6473 1.5625 25.0119C1.5625 24.0247 2.4707 23.4578 3.36914 23.8879ZM48.1152 24.1616C48.3887 24.4548 48.4375 24.5819 48.4375 25.0022C48.4375 25.4225 48.3887 25.5495 48.1152 25.8428C47.7246 26.2728 47.1777 26.3804 46.6504 26.1262C46.1816 25.9112 45.957 25.5398 45.957 25.0022C45.957 24.2006 46.5332 23.6826 47.3633 23.7706C47.7051 23.7999 47.8613 23.8781 48.1152 24.1616ZM10.166 39.8496C10.4883 40.1722 10.5469 40.2895 10.5469 40.6512C10.5469 41.8534 9.26758 42.4106 8.4375 41.5797C8.02734 41.1692 7.93945 40.8173 8.11524 40.309C8.29102 39.791 8.76953 39.4684 9.35547 39.4684C9.72656 39.4684 9.84375 39.5173 10.166 39.8496ZM41.3867 39.6639C42.0313 40.0647 42.1582 40.9933 41.6309 41.5406C40.8008 42.4106 39.4531 41.8632 39.4531 40.6609C39.4531 40.2895 39.502 40.1722 39.834 39.8496C40.1563 39.5271 40.2734 39.4684 40.6348 39.4684C40.8887 39.4684 41.1914 39.5466 41.3867 39.6639ZM25.5762 46.0956C26.3574 46.5159 26.4844 47.552 25.8398 48.1384C25.5469 48.4121 25.4199 48.461 25 48.461C24.5996 48.461 24.4629 48.4121 24.1797 48.1678C23.0664 47.1805 24.2773 45.4016 25.5762 46.0956Z" fill="currentColor"/>
                                <path d="M24.5601 16.1463C24.4527 16.2245 23.8374 17.3388 23.2027 18.629L22.0406 20.9651L19.4527 21.3366C16.5621 21.7666 16.4058 21.8155 16.4058 22.4411C16.396 22.7832 16.5035 22.9005 18.3199 24.6599L20.2437 26.5268L19.7945 29.1464C19.3941 31.5118 19.355 31.8051 19.482 32.0397C19.8042 32.6555 20.0288 32.5968 22.6851 31.2186L25.0191 29.9968L27.3042 31.2186C29.9312 32.6066 30.2339 32.6848 30.5171 32.0201C30.6148 31.7757 30.566 31.3652 30.1949 29.1269L29.7456 26.5268L31.6792 24.6599C33.5835 22.8125 33.6031 22.7832 33.5738 22.4118C33.5249 21.7862 33.3687 21.7373 30.4878 21.3268L27.9195 20.9554L26.7671 18.5899C26.0445 17.114 25.5367 16.1854 25.4097 16.117C25.1363 15.9704 24.7847 15.9801 24.5601 16.1463ZM25.9273 20.32C26.4156 21.2877 26.8746 22.1478 26.9722 22.226C27.0796 22.3238 27.8218 22.4802 29.1109 22.6659C30.1949 22.8223 31.1128 22.9689 31.1324 22.9982C31.1617 23.0276 30.5171 23.6824 29.7066 24.4742C28.3296 25.7937 28.2222 25.9306 28.2222 26.2531C28.2222 26.4486 28.3589 27.387 28.5249 28.3449C28.691 29.3126 28.8081 30.1336 28.7886 30.1825C28.7691 30.2314 27.9781 29.8502 27.0113 29.3419C26.0542 28.8434 25.1558 28.4231 25.0093 28.4231C24.8628 28.4231 23.9644 28.8434 22.9976 29.3419C22.0308 29.8502 21.23 30.2314 21.2105 30.1825C21.191 30.1336 21.3081 29.3126 21.4742 28.3449C21.6402 27.387 21.7769 26.4486 21.7769 26.2629C21.7769 25.9404 21.6499 25.7937 20.3023 24.4644C19.5015 23.6727 18.857 23.008 18.8667 22.9885C18.8863 22.9689 19.8042 22.8223 20.8882 22.6659C22.1382 22.4802 22.939 22.314 23.0367 22.226C23.1246 22.1478 23.5835 21.2877 24.0718 20.32C24.5503 19.3426 24.9703 18.5508 24.9996 18.5508C25.0288 18.5508 25.4488 19.3426 25.9273 20.32Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="inner_service-item-content">
                            <h5 class="inner_service-item-content-title"><a href="#">Integration Capabilities</a></h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting is One of te best AI.</p>
                            <a href="#" class="inner_service-item-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.3">
                    <div class="inner_service-item mb-30">
                        <div class="inner_service-item-icon">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.1 25C1.1 27.1843 1.24636 29.2108 1.5358 31.0818C2.46973 37.1188 4.88746 41.5232 8.70451 44.4383C12.5409 47.3682 17.9297 48.9 25 48.9C32.0703 48.9 37.459 47.3682 41.2955 44.4383C45.1125 41.5232 47.5303 37.1188 48.4642 31.0818C48.7536 29.2108 48.9 27.1843 48.9 25C48.9 22.8157 48.7536 20.7892 48.4642 18.9182C47.5303 12.8812 45.1125 8.47683 41.2955 5.56171C37.4591 2.6318 32.0703 1.1 25 1.1C17.9297 1.1 12.5409 2.6318 8.70451 5.56171C4.88745 8.47683 2.46972 12.8812 1.5358 18.9182C1.24636 20.7892 1.1 22.8157 1.1 25Z" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M32.2337 25C32.2337 31.2346 31.3129 37.3678 29.8461 41.908C29.1108 44.1844 28.2574 45.9994 27.358 47.2216C26.4373 48.473 25.6271 48.9 25.0003 48.9C24.3735 48.9 23.5634 48.473 22.6426 47.2216C21.7433 45.9994 20.8899 44.1844 20.1545 41.908C18.6877 37.3678 17.767 31.2346 17.767 25C17.767 18.7654 18.6877 12.6322 20.1545 8.09196C20.8899 5.81563 21.7433 4.00062 22.6426 2.77835C23.5634 1.52696 24.3735 1.1 25.0003 1.1C25.6271 1.1 26.4373 1.52696 27.358 2.77835C28.2574 4.00062 29.1108 5.81563 29.8461 8.09196C31.3129 12.6322 32.2337 18.7654 32.2337 25Z" stroke="currentColor" stroke-width="2.2"/>
                            </svg>
                        </div>
                        <div class="inner_service-item-content">
                            <h5 class="inner_service-item-content-title"><a href="#">Proactive Engagement</a></h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting is One of te best AI.</p>
                            <a href="#" class="inner_service-item-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service area end -->

    <!-- work area start -->
    <section class="inner_work-area">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="inner_work-img w_img tp_fade_rightt">
                        <img src="{{ asset('assets/images/work/innerPage/bg-3.png') }}" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-7">
                    <div class="inner_work-wrap">
                        <div class="inner_section-area mb-30 tp_fade_bottom">
                            <span class="inner_section-subtitle tp_subtitle_anim">Work History</span>
                            <h2 class="inner_section-title tp_title_slideup mb-0">
                                Create Your Own AI <br> Business With Us</h2>
                        </div>
                        <div class="inner_work-content tp_fade_bottom">
                            <div class="inner_work-item">
                                <div class="inner_work-item-number">
                                    <h3>25K+</h3>
                                </div>
                                <div class="inner_work-item-text">
                                    <p>Client satisfaction is at the heart of what we do. We take pride in achieving a 95% client satisfaction rate</p>
                                </div>
                            </div>
                            <div class="inner_work-item">
                                <div class="inner_work-item-number">
                                    <h3>12K+</h3>
                                </div>
                                <div class="inner_work-item-text">
                                    <p>Our team of storytellers has crafted over 500 compelling narratives that resonate with audiences</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="theme-btn-2 tp_fade_bottom">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- work area end -->

    <!-- feature area start -->
    <section class="inner_feature-area pt-110">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="inner_feature-content mb-40">
                        <div class="inner_section-area mb-20">
                            <span class="inner_section-subtitle tp_subtitle_anim">Features</span>
                            <h2 class="inner_section-title tp_title_slideup mb-30">
                                Start Writing Faster with Doodle tool</h2>
                            <p class="inner_section-text tp_fade_bottom">We've done it carefully and simply. Combined with the ingredients makes for beautiful landings.</p>
                        </div>
                        <ul class="inner_feature-content-list tp_fade_bottom">
                            <li>Seamless Integration</li>
                            <li>Smart Automation</li>
                            <li>Top-notch Security</li>
                        </ul>
                        <a href="#" class="theme-btn-2 tp_fade_bottom">Explore More</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="inner_feature-img-2 mb-40">
                        <img src="{{ asset('assets/images/about/home2/bg.png') }}" alt="Image Not Found" class="inner-img-1 tp_fade_left">
                        <img src="{{ asset('assets/images/about/home2/bg-2.png') }}" alt="Image Not Found" class="inner-img-2 tp_fade_bottom">
                        <img src="{{ asset('assets/images/about/home2/shape.png') }}" alt="Image Not Found" class="inner-img-shape">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature area end -->

    <!-- brand area start -->
    <section class="h2_brand-area pt-95">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-8 col-lg-9 col-md-10">
                    <div class="inner_section-area text-center mb-50">
                        <span class="inner_section-subtitle tp_subtitle_anim">Our Client</span>
                        <h2 class="inner_section-title tp_title_slideup mb-0">15,000+ Professionals & Teams Choose Doodle</h2>
                    </div>
                </div>
            </div>
            <div class="h2_brand-wrap">
                <div class="h2_brand-item tp_has_fade_anim" data-fade-from="bottom">
                    <img src="{{ asset('assets/images/brand/1.png') }}" alt="Image Not Found">
                </div>
                <div class="h2_brand-item tp_has_fade_anim" data-fade-from="bottom">
                    <img src="{{ asset('assets/images/brand/2.png') }}" alt="Image Not Found">
                </div>
                <div class="h2_brand-item tp_has_fade_anim" data-fade-from="bottom">
                    <img src="{{ asset('assets/images/brand/3.png') }}" alt="Image Not Found">
                </div>
                <div class="h2_brand-item tp_has_fade_anim" data-fade-from="bottom">
                    <img src="{{ asset('assets/images/brand/4.png') }}" alt="Image Not Found">
                </div>
                <div class="h2_brand-item tp_has_fade_anim" data-fade-from="bottom">
                    <img src="{{ asset('assets/images/brand/5.png') }}" alt="Image Not Found">
                </div>
            </div>
        </div>
    </section>
    <!-- brand area end -->

    <!-- testimonial area start -->
    <section class="h2_testimonial-area pb-95 pt-135">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="inner_section-area text-center">
                        <span class="inner_section-subtitle tp_subtitle_anim">Testimonials</span>
                        <h2 class="inner_section-title tp_title_slideup mb-0">Trusted by 1000+ companies</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="h2_testimonial-active swiper pb-40 pt-50 tp_fade_bottom">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="h2_testimonial-item">
                                    <div class="h2_testimonial-icon">
                                        <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.06">
                                            <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                            <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="h2_testimonial-head">
                                        <div class="h2_testimonial-head-img">
                                            <img src="{{ asset('assets/images/testimonial/1.png') }}" alt="Image Not Found">
                                        </div>
                                        <div class="h2_testimonial-head-info">
                                            <h6>Hanson Deck</h6>
                                            <span>Blogger</span>
                                        </div>
                                    </div>
                                    <ul class="h2_testimonial-rating">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-thin fa-star"></i></li>
                                    </ul>
                                    <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="h2_testimonial-item">
                                    <div class="h2_testimonial-icon">
                                        <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.06">
                                            <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                            <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="h2_testimonial-head">
                                        <div class="h2_testimonial-head-img">
                                            <img src="{{ asset('assets/images/testimonial/2.png') }}" alt="Image Not Found">
                                        </div>
                                        <div class="h2_testimonial-head-info">
                                            <h6>Nigel Nigel</h6>
                                            <span>President of Sales</span>
                                        </div>
                                    </div>
                                    <ul class="h2_testimonial-rating">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-thin fa-star"></i></li>
                                    </ul>
                                    <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="h2_testimonial-item">
                                    <div class="h2_testimonial-icon">
                                        <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.06">
                                            <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                            <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="h2_testimonial-head">
                                        <div class="h2_testimonial-head-img">
                                            <img src="{{ asset('assets/images/testimonial/3.png') }}" alt="Image Not Found">
                                        </div>
                                        <div class="h2_testimonial-head-info">
                                            <h6>Max Conversion</h6>
                                            <span>SEO Contain Writer</span>
                                        </div>
                                    </div>
                                    <ul class="h2_testimonial-rating">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-thin fa-star"></i></li>
                                    </ul>
                                    <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="h2_testimonial-item">
                                    <div class="h2_testimonial-icon">
                                        <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.06">
                                            <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                            <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="h2_testimonial-head">
                                        <div class="h2_testimonial-head-img">
                                            <img src="{{ asset('assets/images/testimonial/4.png') }}" alt="Image Not Found">
                                        </div>
                                        <div class="h2_testimonial-head-info">
                                            <h6>Nathaneal Down</h6>
                                            <span>Blogger</span>
                                        </div>
                                    </div>
                                    <ul class="h2_testimonial-rating">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-thin fa-star"></i></li>
                                    </ul>
                                    <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit</p>
                                </div>
                            </div>
                        </div>
                        <div class="h2_testimonial-pagination pt-55 text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial area end -->

    <!-- blog area start -->
    <section class="h2_blog-area pb-140">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="inner_section-area text-center mb-50">
                        <span class="inner_section-subtitle tp_subtitle_anim">Our Blog</span>
                        <h2 class="inner_section-title tp_title_slideup mb-0 inner_section-title tp_title_slideup-big">Our Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="swiper h2_blog-active tp_fade_bottom">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="h2_blog-item">
                            <div class="h2_blog-img mb-35 w_img tp_fade_left">
                                <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home2/1.png') }}" alt="Image Not Found"></a>
                            </div>
                            <div class="h2_blog-content">
                                <div class="h2_blog-content-meta">
                                    <span><a href="#">Creative</a></span>
                                    <span><i class="fa-light fa-calendar-days"></i>April 18, 2024</span>
                                </div>
                                <h4 class="h2_blog-content-title">
                                    <a href="{{ url('blog-details') }}">How to choose the right line an app development?</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="h2_blog-item">
                            <div class="h2_blog-img mb-35 w_img tp_fade_left">
                                <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home2/2.png') }}" alt="Image Not Found"></a>
                            </div>
                            <div class="h2_blog-content">
                                <div class="h2_blog-content-meta">
                                    <span><a href="#">Ai</a></span>
                                    <span><i class="fa-light fa-calendar-days"></i>June 18, 2024</span>
                                </div>
                                <h4 class="h2_blog-content-title">
                                    <a href="{{ url('blog-details') }}">AI Content Creation Tools: 7 Tools to Supercharge Pro.</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="h2_blog-item">
                            <div class="h2_blog-img mb-35 w_img tp_fade_left">
                                <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home2/3.png') }}" alt="Image Not Found"></a>
                            </div>
                            <div class="h2_blog-content">
                                <div class="h2_blog-content-meta">
                                    <span><a href="#">Animation</a></span>
                                    <span><i class="fa-light fa-calendar-days"></i>April 18, 2024</span>
                                </div>
                                <h4 class="h2_blog-content-title">
                                    <a href="{{ url('blog-details') }}">Innovative Developments in AI Chatbot Technologies</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h2_blog-pagination text-center pt-50"></div>
            </div>
        </div>
    </section>
    <!-- blog area end -->
@endsection
