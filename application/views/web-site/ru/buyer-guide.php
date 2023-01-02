<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/short_term_residency_permit.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/frequently_asked_questions_faq.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/area_guide.css">
<title>Как купить недвижимость в Турции | Prime Property Turkey</title>
<meta name="description" content="One of the most asked questions by our clients is the process to buy. So, we here at
                                Prime Property Turkey decided to take the time to list the process from step 1 to
                                completion.">


<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.primepropertyturkey.com/ru/How-To-Buy-Property-In-Turkey">
<meta property="og:title" content="Как купить недвижимость в Турции | Prime Property Turkey">
<meta property="og:description" content="One of the most asked questions by our clients is the process to buy. So, we here at
                                Prime Property Turkey decided to take the time to list the process from step 1 to
                                completion.">
<meta property="og:image" content="<?= base_url(); ?>assets/web-site/images/base/finilasim_whatsapp.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://www.primepropertyturkey.com/ru/How-To-Buy-Property-In-Turkey">
<meta property="twitter:title" content="Как купить недвижимость в Турции | Prime Property Turkey">
<meta property="twitter:description" content="One of the most asked questions by our clients is the process to buy. So, we here at
      Prime Property Turkey decided to take the time to list the process from step 1 to
      completion.">
<meta property="og:image" content="<?= base_url(); ?>assets/web-site/images/base/finilasim_whatsapp.jpg">
<link rel="canonical" href="https://www.primepropertyturkey.com/ru/How-To-Buy-Property-In-Turkey"/>
<style type="text/css">
    @media screen and (min-width: 1400px) {
        .header-image-wrapper {
            height: 300px !important;
        }
    }

    @media screen and (min-width: 1200px) and (max-width: 1399px) {
        .header-image-wrapper {
            height: 250px !important;
        }

    }

    @media screen and (min-width: 992px) and (max-width: 1199px) {

    }

    @media screen and (min-width: 768px) and (max-width: 991px) {

    }

    @media screen and (min-width: 576px) and (max-width: 766px) {

    }

    @media screen and (max-width: 575px) {

    }
</style>
</head>
<body>
<?php $this->load->view('web-site/ru/includes/top-section'); ?>
<section id="theme-background">
    <div class="header-image-wrapper">
        <div class="bg" id="area-guide-BG"></div>
        <div class="mask"></div>
        <div class="header-image-content offset-bottom">
            <p class="title text-center px-1 font-weight-bold">Руководство покупателя</p>
            <p class="text-center px-1"> Процесс покупки недвижимости в Турции </p>
            <p class="text-center px-1">
                <? if ($this->session->has_userdata('username') && $this->session->has_userdata('user_info')) { ?>
                    <a href="<?= base_url(); ?>assets/web-site/pdfs/basliksiz.pdf"
                       download="PrimePropertyTurkey_buyersGuide" class="btn red-button pulse-animation-high-white">
                        Скачать Руководство покупателя PDF </a>
                <? } else { ?>
                    <a href="<?= base_url(); ?>signup" class="btn red-button pulse-animation-high-white"> Скачать
                        Руководство покупателя PDF </a>
                <? } ?>
            </p>
        </div>
    </div>
</section>
<section id="content-buy-online">
    <div class="container">
        <div class="row justify-content-center py-2 py-md-5">
            <div class="col-lg-8 content">
                <div class="card my-2">
                    <div class="card-body px-4 pt-4 pb-1 text-center">
                        <h1 class="mt-5 mb-4 font-weight-bold" style="font-size: 2rem">Как купить недвижимость в
                            Турции</h1>
                        <div class="border"></div>
                        <p class="px-4 mt-5 text-justify">
                            Одним из наиболее часто задаваемых вопросов наших клиентов является процесс покупки
                            недвижимости в Турции. Поэтому мы в Prime Property Turkey решили потратить время на то,
                            чтобы описать весь процесс от первого шага до завершения. Мы включим в стоимость время,
                            которое необходимо провести с нами во время вашего поиска, а также время общения с
                            адвокатами и нотариусом
                        </p>
                        <img src="<?= base_url(); ?>assets/web-site/images/base/buyerguide.jpg"
                             alt="buyer guide"
                             class="img-fluid px-3">
                        <p class="px-4 text-left py-3" style="line-height: 1.7rem!important;">
                            <a style="cursor: pointer; color: blue; display: block;" id="Link1"><i
                                        class="fas fa-unlink mx-2"></i> Процесс просмотра и бронирования</a>
                            <a style="cursor: pointer; color: blue; display: block;" id="Link_2"><i
                                        class="fas fa-unlink mx-2"></i> Получение идентификационного номера
                                налогоплательщика</a>
                            <a style="cursor: pointer; color: blue; display: block;" id="Link_3"><i
                                        class="fas fa-unlink mx-2"></i> Открытие банковского счета</a>
                            <a style="cursor: pointer; color: blue; display: block;" id="Link_4"><i
                                        class="fas fa-unlink mx-2"></i> Законность</a>
                            <a style="cursor: pointer; color: blue; display: block;" id="Link_5"><i
                                        class="fas fa-unlink mx-2"></i> Доверенность</a>
                            <a style="cursor: pointer; color: blue; display: block;" id="Link_6"><i
                                        class="fas fa-unlink mx-2"></i> Отчет об оценке</a>
                            <a style="cursor: pointer; color: blue; display: block;" id="Link_7"><i
                                        class="fas fa-unlink mx-2"></i> Затраты на покупку недвижимости в Турции</a>
                            <a style="cursor: pointer; color: blue; display: block;" id="Link_8"><i
                                        class="fas fa-unlink mx-2"></i> Ежегодные и ежемесячные расходы на покупку недвижимости в Турции</a>
                            <a style="cursor: pointer; color: blue; display: block;" id="Link_9"><i
                                        class="fas fa-unlink mx-2"></i> Подоходный налог на турецкие дома</a>
                            <a style="cursor: pointer; color: blue; display: block;" id="Link_10"><i
                                        class="fas fa-unlink mx-2"></i> Налог на прирост капитала на турецкие дома</a>
                        </p>
                        <h3 class="text-left p-4" style="font-size: 1.35rem" id="Link1-target">
                            <b>1. Процесс просмотра и бронирования</b>
                        </h3>
                        <p class="px-4 text-justify">
                            На сайте Prime Property Turkey представлены сотни объектов недвижимости на выбор. Учитывайте
                            стиль жизни, который вам нужен, размер вашей семьи, бюджет, близость к удобствам и т.д., и
                            менеджеры по продажам Prime Property Turkey помогут вам купить лучшую недвижимость в Турции.
                        </p>
                        <p class="px-4 text-justify">
                            Как только мы найдем подходящий проект (это может занять 3-4 дня), вы выберете конкретный
                            объект и заплатите застройщику сбор за резервирование, примерно 1 000 долларов США или 1% от
                            стоимости покупки. Большинство застройщиков принимают кредитную карту (по турецкому
                            законодательству она также подлежит возврату в течение 14 дней). На этом этапе, в
                            зависимости от застройщика, вам выдадут либо договор купли-продажи, либо форму бронирования.
                        </p>
                        <p class="px-4 text-justify" style="font-weight: 700;font-style: italic">
                            Каждый разработчик отличается от другого, поэтому, пожалуйста, поймите, что это не
                            стандартизированная процедура здесь, в Турции.
                        </p>
                        <h3 class="text-left p-4" style="font-size: 1.35rem" id="Link2_target">
                            <b>2. Получение идентификационного номера налогоплательщика</b>
                        </h3>
                        <p class="px-4 text-justify">
                            После этого будут завершены начальные шаги по продвижению вашей покупки. Во-первых, мы
                            поможем вам получить турецкий налоговый идентификатор. Этот процесс быстрый и простой. Для
                            заполнения необходимы только паспорт, домашний адрес, номер телефона за границей, имя матери
                            и отца).
                        </p>
                        <h3 class="text-left p-4" style="font-size: 1.35rem" id="Link3_target">
                            <b>3. Открытие банковского счета</b>
                        </h3>
                        <p class="px-4 text-justify">
                            После этого мы отвезем вас в выбранный вами банк для открытия местного счета на ваше имя.
                        </p>
                        <p class="px-4 text-justify" style="font-weight: 700;font-style: italic">
                            Мы предоставляем только транспорт и перевод для этого процесса. Нам ни в коем случае не дают
                            никакой информации о счетах или реквизитах.
                        </p>
                        <p class="px-4 text-justify">
                            Ваши ежемесячные коммунальные услуги будут списываться с этого счета с помощью системы
                            автоматического перевода средств, чтобы облегчить управление переходом. Ваш доход от аренды
                            также будет перечисляться на этот счет, если вы приобретаете недвижимость в инвестиционных
                            целях.
                        </p>
                        <h3 class="text-left p-4" style="font-size: 1.35rem" id="Link4_target">
                            <b>4. Законность</b>
                        </h3>
                        <p class="px-4 text-justify">
                            При покупке по программе "Гражданство Турции по инвестициям" мы встретимся с выбранным вами
                            адвокатом. При покупке по программе "Гражданство Турции по инвестициям" мы встретимся с
                            выбранным вами адвокатом. Находясь там, адвокат объяснит этапы резервирования до полной
                            выплаты, а также ваши требования. (Вы можете посетить наш список необходимых документов на
                            вкладке "Гражданство по инвестициям").
                        </p>
                        <p class="px-4 text-justify">
                            В это время целесообразно задать любые вопросы, касающиеся процесса, узнать о размерах
                            сборов и графике платежей, а также представить любые проблемы в вашем послужном списке или
                            семейном положении, которые могут помешать успешному рассмотрению вашего заявления на
                            иммиграцию.
                        </p>
                        <h3 class="text-left p-4" style="font-size: 1.35rem" id="Link5_target">
                            <b>5. Доверенность</b>
                        </h3>
                        <p class="px-4 text-justify">
                            Следующим шагом будет выдача доверенности (POA) (1 день). Это очень важный шаг, если вы не планируете находиться в Турции на протяжении всего процесса покупки.
                        </p>
                        <p class="px-4 text-justify">
                            Эта доверенность позволяет вашему адвокату представлять вас в соответствующих сделках по покупке и иммиграции (т.е. подписывать договор купли-продажи, регистрировать свидетельство о праве собственности, и, наконец, подавать заявление на получение вида на жительство и гражданства от вашего имени и от имени всех членов семьи).
                        </p>
                        <p class="px-4 text-justify" style="font-weight: 700;font-style: italic">
                            Имейте в виду, что если вы подаете семейное заявление, ваш супруг или супруга должны также представить отдельное доверенное лицо, чтобы адвокат оформил иммиграционное заявление от их имени.
                        </p>
                        <p class="px-4 text-justify">
                            POA можно оформить в нотариальных конторах Турции и в посольствах Турции по всему миру.
                        </p>

                        <h3 class="text-left p-4" style="font-size: 1.35rem" id="Link6_target">
                            <b>6. Отчет об оценке</b>
                        </h3>
                        <p class="px-4 text-justify">
                            После завершения POA, рассмотрения и подписания соглашений, адвокат закажет отчет об оценке для ваших записей. Обычно это занимает 3-4 дня и стоит 1 250 TL.
                        </p>
                        <p class="px-4 text-justify">
                            После того как соглашения будут рассмотрены и подписаны, будет заказан Отчет об оценке. Процесс получения занимает около 3-4 дней и стоит 1 250 TL.
                        </p>
                        <p class="px-4 text-justify" style="font-weight: 700;font-style: italic">
                            Пожалуйста, помните, что эти оценки являются независимыми от Prime Property Turkey, и мы не имеем никакого влияния на окончательные шаги.
                        </p>
                        <p class="px-4 text-justify">
                            В этом отчете вы найдете местные сравнения, рыночную стоимость, разрешение, информацию о строительстве и любые недостатки, обнаруженные в ходе процесса.
                        </p>
                        <p class="px-4 text-justify">
                            Только после завершения этих шагов вы можете отправиться домой, чтобы оплатить оставшуюся сумму из местного банка посредством банковского перевода.
                        </p>
                        <p class="px-4 text-justify" style="font-weight: 700;font-style: italic">
                            Примечание: Для заявителей на гражданство по инвестициям - необходимо, чтобы счет был открыт только на ваше имя. Любые другие владельцы счетов будут считаться акционерами собственности и увеличат сумму, которую необходимо инвестировать для получения гражданства.
                        </p>
                        <h2 class="p-4 text-left" style="font-size: 1.5rem !important;font-weight: bold"
                            id="Link7_target">
                            Затраты на покупку недвижимости в Турции
                        </h2>
                        <p class="px-4 text-justify">
                            Гербовый сбор (налог на передачу титула) составляет 4% от стоимости покупки; традиционно он делится между вами и застройщиком, но не всегда. Оплата производится после завершения строительства и вступления во владение объектом. Однако некоторые подразделения запрашивают его сразу для скорейшей выдачи свидетельства о праве собственности, если вы хотите получить турецкое гражданство по инвестициям
                        </p>
                        <p class="px-4 text-justify">
                            НДС (налог на добавленную стоимость, как налог с продаж) в размере 1% обычно включается в цену покупки, но является отдельной фиксированной стоимостью
                        </p>
                        <p class="px-4 text-justify">
                            Оформление страховки от стихийных бедствий или по-турецки DASK - максимум 3 000 TL. Депозиты за коммунальные счета - воду, электричество и газ - передаются обслуживающим коммунальным компаниям, и требуется первоначальная плата за установку. В среднем эта сумма составляет не более 3 500 TL.
                        </p>
                        <p class="px-4 text-justify">
                            Эти депозиты будут возвращены, когда недвижимость будет продана или вы сдадите ее арендатору, и коммунальные услуги будут оформлены на его имя.
                        </p>
                        <h2 class="p-4 text-left" style="font-size: 1.5rem !important;font-weight: bold"
                            id="Link8_target">
                            Ежегодные и ежемесячные расходы на покупку недвижимости в Турции
                        </h2>
                        <p class="px-4 text-justify">
                            <b>● Сколько составляет налог на недвижимость в Турции?</b>
                        </p>
                        <p class="px-4 text-justify">
                            Ежегодный налог на недвижимость (emlak vergisi) в Турции взимается со всех объектов недвижимости. Ставка этого налога варьируется от 0,1% до 0,6% в зависимости от места покупки и типа недвижимости. Например, если вы владеете квартирой в Стамбуле, вы будете облагаться более высоким городским налогом в размере .2%, рассчитанным по стоимости недвижимости. Стоимость рассчитывается на основе номинальной стоимости и рассчитывается местным советом. Номинальная стоимость обычно меньше, чем рыночная стоимость.
                        </p>
                        <p class="px-4 text-justify">
                            Налоговые декларации на недвижимость подаются раз в четыре года. Этот налог рассчитывается на основе объектов недвижимости и размера участка в квадратных метрах. Ставки удваиваются для недвижимости в крупных городских районах, таких как Стамбул.
                        </p>
                        <p class="px-4 text-justify">
                            Налог на недвижимость выплачивается непосредственно местным муниципалитетам (беледие) двумя частями каждый год. Первый взнос должен быть выплачен в период с марта по май, а второй - в ноябре, хотя его можно выплатить единовременно с первым платежом. Оплату можно произвести в банках, чеком, онлайн или наличными в местном муниципалитете.
                        </p>
                        <p class="px-4 text-justify" style="font-weight: 700;font-style: italic">
                            * Если налог не уплачивается вовремя, владелец недвижимости ежемесячно выплачивает штраф в размере примерно 2,5 процента от суммы.
                        </p>
                        <p class="px-4 text-justify">
                            При продаже недвижимости владельцы по закону обязаны уплатить налог на передачу собственности, который выплачивается исходя из фактической цены продажи или покупки недвижимости. Сумма в размере примерно 1,5 процента от стоимости недвижимости должна быть уплачена обеими сторонами при регистрации сделки в Земельном кадастре. Prime Property Turkey готова помочь на каждом шагу.
                        </p>
                        <p class="px-4 text-justify">
                            <b>● Плата за обслуживание имущества</b>
                        </p>
                        <p class="px-4 text-justify">
                            Обслуживание недвижимости варьируется в зависимости от застройки, но в среднем составляет около 4-6 TL/ м2 - (В случае аренды арендатор берет на себя оплату этих платежей).
                        </p>
                        <p class="px-4 text-justify">
                            Для получения дополнительной информации о годовых расходах, пожалуйста, обратитесь к нашему блогу об оценке годовых расходов на содержание недвижимости.
                        </p>
                        <h3 class="p-4 text-left" style="font-size: 1.35rem" id="Link9_target">
                            <b>
                                Подоходный налог на турецкие дома
                            </b>
                        </h3>
                        <p class="px-4 text-justify">
                            Подоходный налог взимается со всех владельцев недвижимости в Турции. Он взимается с доходов на дому. Доход от аренды может быть определен либо методом фактического вычета, либо методом паушальной суммы
                        </p>
                        <p class="px-4 text-justify">
                            Метод фактического вычета - это когда из дохода от аренды вычитаются расходы, включая расходы на воду, освещение, страхование и стоимость амортизации.
                        </p>
                        <p class="px-4 text-justify">
                            При единовременном методе налогоплательщики вычитают 25% своего валового дохода, чтобы получить налогооблагаемый доход.
                        </p>
                        <h3 class="p-4 text-left" style="font-size: 1.35rem" id="Link10_target">
                            <b>Налог на прирост капитала на турецкие дома</b>
                        </h3>
                        <p class="px-4 text-justify">
                            Налог на прирост капитала - это то, что вы платите за прирост стоимости актива за время владения им. В Турции налог на прирост капитала уплачивается при продаже дома в течение первых пяти лет после покупки, а если вы продаете его через пять лет после покупки, вы освобождаетесь от его уплаты.
                        </p>
                        <p class="px-4 text-justify">
                            Эта сумма рассчитывается как процент от прибыли, которую вы получаете между заявленной стоимостью вашей недвижимости при покупке и ценой продажи, которую вы объявляете в Земельном реестре (Tapu Office) при продаже.
                        </p>
                    </div>
                </div>
                <div class="card my-3" style="background-color: #eaeaea">
                    <div class="card-body">
                        <div class="useful px-4 py-2">
                            <strong> Did You Find This Useful ? </strong>

                            <button id="like_button"
                                    <? if (is_buyer_guideDisliked()){ ?>style="pointer-events: none;border: 0;background-color: transparent;"
                                    <? }else{ ?>style="border: 0;background-color: transparent;" <? } ?>
                            ><? if (is_buyer_guideLiked()) { ?><span class="pl-2"><i
                                            class="fas fa-thumbs-up"></i></span><? } else { ?><span class="pl-2"><i
                                            class="far fa-thumbs-up"></i></span><? } ?>
                            </button>
                            <button id="Dislike_button"
                                    <? if (is_buyer_guideLiked()){ ?>style="pointer-events: none;border: 0;background-color: transparent;"
                                    <? }else{ ?>style="border: 0;background-color: transparent;"<? } ?> ><? if (is_buyer_guideDisliked()) { ?>
                                    <span class="pl-2"><i class="fas fa-thumbs-down"></i></span><? } else { ?><span
                                        class="pl-2"><i class="far fa-thumbs-down"></i></span><? } ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card side contact my-2" style="position: sticky;top: 100px;">
                    <div class="card-body">
                        <img src="<?= base_url(); ?>assets/web-site/images/base/ezgifc.webp"
                             alt="buyers guide Prime"
                             class="img-fluid">
                        <p class="text-center px-1 mt-4">
                            <? if ($this->session->has_userdata('username') && $this->session->has_userdata('user_info')) { ?>
                                <a href="<?= base_url(); ?>assets/web-site/pdfs/basliksiz.pdf"
                                   download="PrimePropertyTurkey_buyersGuide"
                                   class="btn red-button pulse-animation-high-blue"> Download Buyer Guide
                                    PDF </a>
                            <? } else { ?>
                                <a href="<?= base_url(); ?>signup" class="btn red-button pulse-animation-high-blue">
                                    Download Buyer Guide PDF </a>
                            <? } ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('web-site/ru/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script type="text/javascript">
    $('#Link1').on('click', function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#Link1-target").offset().top - 100
        }, 2000);
    });
    $('#Link_2').on('click', function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#Link2_target").offset().top - 100
        }, 2000);
    });
    $('#Link_3').on('click', function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#Link3_target").offset().top - 100
        }, 2000);
    });
    $('#Link_4').on('click', function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#Link4_target").offset().top - 100
        }, 2000);
    });
    $('#Link_5').on('click', function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#Link5_target").offset().top - 100
        }, 2000);
    });
    $('#Link_6').on('click', function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#Link6_target").offset().top - 100
        }, 2000);
    });
    $('#Link_7').on('click', function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#Link7_target").offset().top - 100
        }, 2000);
    });
    $('#Link_8').on('click', function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#Link8_target").offset().top - 100
        }, 2000);
    });
    $('#Link_9').on('click', function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#Link9_target").offset().top - 100
        }, 2000);
    });
    $('#Link_10').on('click', function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#Link10_target").offset().top - 100
        }, 2000);
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#like_button").on("click", function () {
            $.ajax({
                url: '<?= base_url(); ?>Like/buyer_guide',
                method: 'POST',
                data: {value_data_posted: 'fag'},
                dataType: 'json',
                success: function (response) {
                    if (response) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                }
            });
        });
        $("#Dislike_button").on("click", function () {
            $.ajax({
                url: '<?= base_url(); ?>Dislike/buyer_guide',
                method: 'POST',
                data: {value_data_posted: 'fag'},
                dataType: 'json',
                success: function (response) {
                    if (response) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                }
            });
        });
    });
</script>
</body>
</html>