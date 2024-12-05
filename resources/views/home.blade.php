@extends('master.main')


<style>
    .btn-bg-warning {
        border: 1px solid black; /* Black outline */
        color: black;           /* Black font color */
        background-color: transparent; /* Transparent background */
        transition: background-color 0.3s ease; /* Smooth transition for hover effect */
    }
    /* Hover effect for input buttons */
    .btn-bg-warning:hover {
        background-color: yellow;
        color: black; /* Optional: change text color for contrast */
    }

    /* Maintain focus style when active */
    .btn-bg-warning.active {
        background-color: yellow;
        color: black;
    }
</style>
<style>
    .custom-card {
      position: relative;
      overflow: hidden;
      color: white;
      height: 400px;
      margin: 0px 5px;
    }
    .custom-card img {
      object-fit: cover;
      width: 100%;
      height: 400px;
    }
    .custom-card-content {
        position: absolute;
        top: 78%;
        left: 52%;
        transform: translate(-50%, -50%);
        width: 95%;
    }
    .custom-card .btn {
        margin-top: 0px;
        margin-bottom: 2px;
        padding: 0px 5px;
    }
    .custom-label{
        font-size: 12px !important;
        font-weight: lighter !important;
    }
    .testimonial-swiper-container {
    position: relative;
    margin-bottom: 30px;
    }

    .testimonial-swiper-pagination {
        position: relative;
        bottom: 0;
        margin-top: 20px;
        text-align: center;
    }

    .testimonial-swiper-button-next,
    .testimonial-swiper-button-prev {
        color: #000000; /* Customize as needed */

    }
    .swiper-button-next, .swiper-button-prev {
        top: var(--swiper-navigation-top-offset, 95%);
        height: 10px;
        color: #000000;
}
  </style>

@section('content')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<div class="content-wrapper" id="home">
    <div class="greennature-content">
        <!-- Above Sidebar Section-->
        <!-- Sidebar With Content Section-->
        <div class="with-sidebar-wrapper">
                <section id="content-section-1">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @if($banners)
                                @foreach($banners as $banner)
                                    <div class="swiper-slide">
                                        <div class="swiper-slide-content">
                                            <img src="{{ asset($banner->image) }}" alt="Banner Image" class="img-fluid banner-image">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- Add Navigation Buttons -->
                        <!-- <div class="swiper-button-prev left-arrow"></div>
                        <div class="swiper-button-next right-arrow"></div> -->
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const swiper = new Swiper('.swiper-container', {
                                loop: true, // Infinite loop
                                autoplay: {
                                    delay: 5000, // 3 seconds delay
                                    disableOnInteraction: false, // Keep autoplaying even after interactions
                                },
                                pagination: {
                                    el: '.swiper-pagination',
                                    clickable: true, // Pagination is clickable
                                },
                                navigation: {
                                    nextEl: '.right-arrow',
                                    prevEl: '.left-arrow',
                                },
                                effect: 'fade', // Add a fade transition effect
                                fadeEffect: {
                                    crossFade: true,
                                },
                            });
                        });
                    </script>

                </section>
        </div>
    </div>
</div>
{{-- <select name="car_make" class="sm-form-control makes-list  required" required="required">
    <option value="">Select Make</option><option value="66F25A17-A262-4420-9085-2B15BC7A72F2">Abarth</option><option value="2E272D2E-8507-474A-B93A-1E1E2C69778E">Acura</option><option value="2A496BC0-259C-498A-A1DE-4C8B7A055A43">Al Damani</option><option value="382F5C04-45F4-4E5E-81E5-2F839AED0E9A">Alfa Romeo</option><option value="B11DCA16-8DE0-4EF7-9D7D-B03B5D6179CF">Ashok Leyland</option><option value="06EC33B2-AD61-4582-9C93-FE3A0B18F316">Aston Martin</option><option value="759A3333-5785-4993-84E4-C6B61253A920">Audi</option><option value="97DFE422-2712-4D2B-9BDB-A7B12E807BF8">BAIC</option><option value="B9CB0865-945B-4040-A7D9-3893C429A26F">Bentley</option><option value="0CE521B8-ED68-4AEC-ADE3-64845869D9E8">Bestune</option><option value="FF3C815B-A9D2-499D-A3CF-7C122C7CB9DD">BMW</option><option value="06879E09-0129-4616-B2C6-E62C3966F557">Borgward</option><option value="5E18A0AB-4E92-476D-A0C8-6384DD892DE8">Brilliance</option><option value="3DBBA637-C334-4007-B880-933B36A11020">Bugatti</option><option value="0762C325-C287-4736-B6F0-5CDC4545CD49">BYD</option><option value="6508F8A4-1271-4E73-BF1E-D93237AA4BE4">Cadillac</option><option value="90FBB8AF-8BEF-49F1-96A2-9FD970262209">Carbodies</option><option value="CE0E7B20-5F0D-4560-8A34-5560C7CF0152">Caterham</option><option value="FA58A263-4F07-450A-BA32-AF02191CA348">Changan</option><option value="703704F6-1D7E-459D-91B7-40C8ED996B59">Chery</option><option value="1DE1B385-66B7-459A-AF24-9D12315F5AC2">Chevrolet</option><option value="5E10506A-FBF5-406E-82D7-753C4A5D5F6C">Chrysler</option><option value="C8D2CD99-12A5-4B49-85FA-7F2FFD9E75B8">Citroen</option><option value="90C7E386-057C-401D-9013-79C5C905F962">CMC</option><option value="550E07CD-7191-42A0-AFEA-1E45F0BC5E7E">Daihatsu</option><option value="409407B1-DE3C-4AD1-8F1C-D047714569E1">Devel</option><option value="20401C00-10F2-4603-A9C6-9A22CAD2BA58">Dodge</option><option value="DB43B21D-3222-401D-861D-B1372788A4F2">Dongfeng</option><option value="9550E1CD-2C55-431A-919A-BCE045A1F4A3">Dorcen</option><option value="B76B305D-CFE0-4FB2-ACCC-DEA087045E4A">Exeed</option><option value="28EEFD65-27E7-40FB-978D-54FEDA65FD2D">FAW</option><option value="181CB7A7-8806-4156-976C-65B3C07F7725">Ferrari</option><option value="5A11C218-271B-4F3B-A51C-100831E00659">Fiat</option><option value="3A991AE7-7A19-44F5-B299-1BB5713DD32E">Fisker </option><option value="926EE33F-6D39-44C6-BB17-685B26B38BC1">Force</option><option value="31EE70BD-816C-40AC-B4BC-B344980C4A8B">Ford</option><option value="C78AED0B-454E-42DB-BAE7-97D5F398DBDF">Forthing</option><option value="5DD13718-C12D-4139-9C8F-855C9BED6747">Foton</option><option value="5B9BBAC3-5063-41F6-934F-7AB9CBAF1387">GAC</option><option value="8C87F367-E80B-4FE4-A235-6D2A17C55C3B">Geely</option><option value="98F614F6-BBD9-4D83-BCC8-DE8FCCD5F7C7">Genesis</option><option value="9556E676-6B4A-4829-B30E-E1084160D171">GMC</option><option value="AF21B3C2-5918-43A1-BC43-642E70A96AA7">Great Wall</option><option value="62F1A1E1-DC3E-4E88-A6D4-FC11ED8473C2">Haval</option><option value="4010ABDD-4E7B-4A46-809C-00C7854925BB">HiPhi</option><option value="FC1C9B1F-F2A8-429A-BDB4-065492BC968E">Honda</option><option value="79998A67-AABC-496B-9E1F-D88522C3D281">Hongqi</option><option value="82130EFE-8FCE-4208-8D42-23F8EF38AB76">Hummer</option><option value="DFBEDF00-F211-423D-9249-465B736CC367">Hyundai</option><option value="5FBA1263-C0B8-476E-A293-3608C3CBD557">Ineos</option><option value="9DCE4A2A-3987-4316-A1F4-2F82DAF62DEB">Infiniti</option><option value="E01C47FD-EE4D-4885-8A05-2DF8729BBA3E">International </option><option value="681AD622-2A5A-4621-B0E2-246034627AEB">Isuzu</option><option value="F785C30E-B86C-460A-BF55-6CFA7E7D9041">Iveco</option><option value="17021649-FA1A-4B97-80EE-DBA1AFA7D48C">JAC</option><option value="6F63B6D0-C74C-40F9-9EA3-3782B7FC4883">Jaguar</option><option value="1DF532F9-01D2-4074-B700-CDA432DF7906">Jeep</option><option value="4A035694-B77B-41FE-8D59-5C9198B2CB37">Jetour</option><option value="11BA6391-8E89-41B2-A455-B4F4B2549137">JMC</option><option value="26609E2B-E61D-4350-B75E-009317E70C95">KAIYI</option><option value="405E9986-49D1-43DD-A4EC-DA6705C93274">Kia</option><option value="5300F967-FE99-4B5D-BD5D-DBF6037F0FE3">King Long</option><option value="E91D02D8-5A29-491A-81E4-7BBA7B5B61DD">Koenigsegg</option><option value="528AD3EE-FCF3-4CE4-B21A-A107A5F9F6A3">KTM</option><option value="3FF7591C-ABC2-4A41-A09A-0C82C838A6F4">Lamborghini</option><option value="08D3A468-A3F3-4636-AC9A-00CA22471C86">Land Rover</option><option value="07B8891F-7C3A-4E35-994D-1FC99E552878">Lexus</option><option value="EF8C0FDF-0173-46C7-A134-DBCD4B4E094B">Lincoln</option><option value="A359569B-CB70-4BB7-8B41-9E4CFFF5E208">Lotus</option><option value="E7119CA9-A9A5-4421-9BCC-5674A6E59F84">Lucid</option><option value="8362564F-F921-4374-B814-797449085D3E">Luxgen</option><option value="B683E252-12BC-4C48-AEF1-D83CA9A38422">Lynk &amp; Co</option><option value="F6A287AE-5880-4413-9BBF-DCEF197C975B">Mahindra</option><option value="12B3FCFC-B485-4C96-A245-01FD0BC1BBBF">Man</option><option value="9251E82B-F114-4AD1-AD1A-F7B4F13B53C4">Marcopolo</option><option value="95B9DFB6-0D26-4AC0-9A75-45B58AC1B4C0">Maserati</option><option value="F8D89563-D246-4D45-9AE2-84996AB468DC">Maxus</option><option value="AD6CBBA3-368F-4C59-B12B-4DB2AB96DB44">Maybach</option><option value="D5796C35-164C-4C3D-ACB3-757F0FCA808F">Mazda</option><option value="FB1AB0E7-2FC1-4BD2-85E2-7B208EA16630">McLaren</option><option value="F90984D9-E5BD-4063-9FE1-5FAB7552BEC7">Mercedes-Benz</option><option value="684ACE2A-60FC-445D-B6F7-2295EDEA968A">Mercury</option><option value="6AF02B88-60B6-4DB2-BC0F-7EA2D04516BD">MG</option><option value="E484250F-0CC4-4C70-B0B7-E7D43CA5921D">Mini</option><option value="1853895F-5422-403B-95C7-75FE5BF14B81">Mitsubishi</option><option value="9683BCC3-0963-41D4-B917-66086B3120EC">Morgan</option><option value="54CD5F59-680D-4E6B-A828-94A448C5B84A">NIO</option><option value="C5617D45-9536-484C-ACFA-5EB3ABB3E18C">Nissan</option><option value="2386D7F6-006E-4401-AB39-452F7694CBAB">Noble</option><option value="1CB2723D-D426-4952-9B64-CFF89B5A8270">Omoda</option><option value="7637E930-B941-4FB4-9DB8-37B14D0C679C">Opel</option><option value="66689B67-040D-406A-BF21-4BBBD12D2664">Oullim</option><option value="8D5C70B7-E490-4FD6-9EDE-C3E3C73C5E85">Pagani</option><option value="C137E90C-64B8-44DC-80B0-59B777C5A87D">Peugeot</option><option value="BE3B50CF-786A-47F8-BA39-486BAF44DBF6">PGO</option><option value="09E0C8BE-56DD-4DB7-9CD0-B366AB0A7AE7">PlateNumber</option><option value="7AE05A47-5BF3-4363-8210-63E6ED6D5314">Polestar</option><option value="42B90D9C-5C0E-465A-8912-7DFCA07CD5BE">Pontiac</option><option value="3A8D19B4-9CDE-4216-9DF2-3ABC2AC7F621">Porsche</option><option value="A4838B65-FD4C-4D1E-BECC-256F807F7BE4">Proton</option><option value="E27C7443-817C-4963-815D-F8CAE2FCAD14">Rabdan</option><option value="9BE268FC-1A76-4AE2-B1A7-FA50469AC8B3">Ram</option><option value="92D77C8C-0FAB-40DC-858F-CEA821107DE8">Renault</option><option value="26623320-A98B-4F01-BA02-379140191DE9">Rolls Royce</option><option value="A615EA63-686D-49D8-ABCA-764D7439EA4D">Rover</option><option value="BBA48569-66B0-4079-BD97-B097033BCEB7">ROX</option><option value="752E3134-6BFF-48C1-BFE4-4C456F1230E7">Saab</option><option value="B6EF263B-1FF2-46B8-B873-82C4E7DC65B5">Sandstorm</option><option value="223F99E3-4399-46BD-8D15-72B464636817">Seat</option><option value="F40A62E6-3180-43A4-9C1A-AF0BDF72C12D">Seres</option><option value="6FB60E62-5B34-4FA3-9F0F-005897158AA1">Skoda</option><option value="0632DA02-EAE3-40A9-A113-DEE9BA032815">Skywell</option><option value="1411AEAE-CF53-45D9-BF4A-9E5A57E16948">Smart</option><option value="890073D1-ECDA-461C-8EFB-6FAB23B2888A">Soueast</option><option value="7FB80D9B-212F-4F93-B9D9-CD5C6045EB26">Spyker</option><option value="6CC70A1E-9945-4206-B562-B761E5CAC5BD">Ssangyong</option><option value="60D62B1D-065D-46F7-B273-29D16480765E">Subaru</option><option value="AC60422B-77D9-42E7-85F9-6C6C85C7BA33">Suzuki</option><option value="6EC617AF-4649-4518-960C-09D172B854F7">Tank</option><option value="C1B36A0A-FCBE-4E25-9177-19D0CF8B2B48">Tata</option><option value="8C677DFE-25C4-4823-BBF4-866D848D5CF7">Tesla</option><option value="CCA9D5D9-5149-48B0-9C9A-7FC1E4FD942F">Toyota</option><option value="BA460440-7240-4383-9DAB-5B2C40B3E52C">Trumpchi</option><option value="87909F74-78DC-46CA-AD5A-FD7AC4B947E4">UAZ</option><option value="A6A61A44-479A-4729-93AB-0B946B938D5A">VGV</option><option value="5B0E3213-4F42-43B4-B010-41BEBDF1D471">Volkswagen</option><option value="95CED3C5-C368-4094-AB6C-0A66FA88ADBC">Volvo</option><option value="A3E08361-4884-49EF-B888-8DBC0B4BC471">W Motors</option><option value="324045C6-6BA9-4729-B898-55A6F4990624">yamaha</option><option value="B04295AB-589D-4E08-8602-3CE28B09C0F3">Zarooq Motors</option><option value="9AA6AE5A-95DB-4EB0-8555-E69721D06EF4">ZEEKR</option><option value="8D925FF9-7789-49AF-AC15-02ACB23A0C11">ZNA</option><option value="C48EA735-0091-4898-95BF-5A2B8954D713">Zotye</option>
</select> --}}
<script>
    const options = document.querySelectorAll('select[name="car_make"] option');
    const carNames = Array.from(options).map(option => option.textContent.trim());
    console.log(carNames); // Debugging purposes


    fetch('/store-car-names', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ carNames })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => console.log('Server Response:', data))
    .catch(error => console.error('Error:', error));
</script>




{{-- <select name="car_year" class="sm-form-control required valid" required="required" aria-invalid="false">
    <option value="" class="hidden">Select Model year</option>
    <option value="2023">2024</option>
    <option value="2023">2023</option>
    <option value="2022">2022</option>
    <option value="2021">2021</option>
    <option value="2020">2020</option>
    <option value="2019">2019</option>
    <option value="2018">2018</option>
    <option value="2017">2017</option>
    <option value="2016">2016</option>
    <option value="2015">2015</option>
    <option value="2014">2014</option>
    <option value="2013">2013</option>
    <option value="2012">2012</option>
    <option value="2011">2011</option>
    <option value="2010">2010</option>
    <option value="2009">2009</option>
    <option value="2008">2008</option>
    <option value="2007">2007</option>
    <option value="2006">2006</option>
    <option value="2005">2005</option>
    <option value="2004">2004</option>
    <option value="2003">2003</option>
    <option value="2002">2002</option>
    <option value="2001">2001</option>
    <option value="2000">2000</option>
</select>
<select name="car_model" class="sm-form-control models-list required valid" required="required" aria-invalid="false"><option value="">Select Model</option><option value="A3">A3</option><option value="A3 Sedan">A3 Sedan</option><option value="A4">A4</option><option value="A5">A5</option><option value="A5 Cabriolet">A5 Cabriolet</option><option value="A6">A6</option><option value="A7">A7</option><option value="A8">A8</option><option value="E-Tron">E-Tron</option><option value="E-Tron Sportback">E-Tron Sportback</option><option value="Q3">Q3</option><option value="Q5">Q5</option><option value="Q7">Q7</option><option value="Q8">Q8</option><option value="R8">R8</option><option value="RS">RS</option><option value="S">S</option><option value="S Q8">S Q8</option><option value="S3">S3</option><option value="S4">S4</option><option value="S6">S6</option><option value="S8">S8</option></select> --}}

<script>
    // Collect data from the dropdowns
    const yearSelect = document.querySelector('select[name="car_year"]');
    const modelSelect = document.querySelector('select[name="car_model"]');

    // Extract selected year and model
    const selectedYear = yearSelect.value;
    const selectedModels = Array.from(modelSelect.options)
        .filter(option => option.value) // Exclude empty options
        .map(option => ({ model_name: option.textContent.trim(), model_value: option.value }));

        fetch('/store-car-data', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({
                car_year: selectedYear,
                car_models: selectedModels
            }),
        })
        .then(response => response.json())
        .then(data => console.log('Server Response:', data))
        .catch(error => console.error('Error:', error));

</script>





<!-- <div class="box" id="exampleModa">
    <h1>tell us about your car</h1>
    <h6>Car Information</h6>
        <div class="row">
            <div class="input-group mb-3">
                <select class="form-select" name="car_type" id="car_type">
                    <option value="" selected disabled>Type of Car</option>
                    @foreach($carTypes as $carType)
                        <option value="{{ $carType->id }}">{{ $carType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" name="model" id="model">
                    <option value="" selected disabled>Model of Car</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="specification" placeholder="Specification/Trim (e.g.,“E350 Sport”)"
                    aria-label="default input example">
            </div>
            <div class="input-group mb-3">
                <input class="form-control" name="engine_size" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Engine Size(1499cc)"
                    aria-label="default input example">
            </div>
            <div class="input-group mb-3">
                <select class="form-select" name="year" id="inputGroupSelect02">
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <input class="form-control" name="kilometers" type="text" placeholder="kilometers" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    aria-label="default input example">
            </div>
        </div>
        <button type="button" id="next-button-modal1" class="button btn" >
            Next
        </button>
</div> -->
<div class="car_detail">
<div class="card" id="exampleModa">
    <h1>tell us about your car</h1>
        <div class="row card-body">
        <h6>Car Information</h6>
            <div class="input-group mb-3">
                <select class="form-select" name="car_type" id="make-dropdown">
                    <option value="">Select Make</option>
                </select>
                {{-- <select class="form-select" name="car_type" id="car_type">

                    <option value="" selected disabled>Select Make</option>
                    @foreach($carTypes as $carType)
                        <option value="{{ $carType->id }}">{{ $carType->name }}</option>
                    @endforeach
                </select> --}}
            </div>
            <div class="input-group mb-3">
                <select class="form-select" name="year" id="year-dropdown">
                    <option value="">Select Year</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                </select>
                {{-- <select class="form-select" name="year" id="inputGroupSelect02">
                    <option value="">Select Model year</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                </select> --}}
            </div>
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="model" placeholder="Enter Model"
                    aria-label="default input example">
                {{-- <select class="form-select" name="model" id="model-dropdown">
                    <option value="">Select Model</option>
                </select> --}}
                {{-- <select class="form-select" name="model" id="model">
                    <option value="" selected disabled>Model of Car</option>
                </select> --}}
            </div>
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="specification" placeholder="Specification/Trim (e.g.,“E350 Sport”)"
                    aria-label="default input example">
            </div>
            <div class="input-group mb-3">
                <input class="form-control" name="engine_size" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Engine Size(1499cc)"
                    aria-label="default input example">
            </div>
            <div class="input-group mb-3">
                <input class="form-control" name="kilometers" type="text" placeholder="kilometers" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    aria-label="default input example">
            </div>
        </div>
        <button type="button" id="next-button-modal1" class="button btn" >
            Next
        </button>
    </div>
</div>



    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <h3>TELL US ABOUT YOUR CAR</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h6>Additional Questions</h6>
                    <p>GCC Spec?</p>
                    <div class="button-group">
                        <button type="button" class="btn-modalone" name="gcc_spec" value="yes">Yes GCC</button>
                        <button type="button" class="btn-modalone" name="gcc_spec" value="american">American</button>
                        <button type="button" class="btn-modalone" name="gcc_spec" value="european">European</button>
                        <button type="button" class="btn-modalone" name="gcc_spec" value="japanese">Japanese</button>
                        <button type="button" class="btn-modalone" name="gcc_spec" value="unknown">I Don't Know</button>
                    </div>
                    <p>Overall Condition</p>
                    <div class="button-group">
                        <button type="button" class="btn-modaltwo" name="condition" value="excellent">Excellent</button>
                        <button type="button" class="btn-modaltwo" name="condition" value="good">Good</button>
                        <button type="button" class="btn-modaltwo" name="condition" value="average">Average</button>
                        <button type="button" class="btn-modaltwo" name="condition" value="poor">Poor</button>
                    </div>
                    <p>Paintwork</p>
                    <div class="button-group">
                        <button type="button" class="btn-modalthree" name="paintwork" value="original">Original Paint</button>
                        <button type="button" class="btn-modalthree" name="paintwork" value="partial">Partial Repaint</button>
                        <button type="button" class="btn-modalthree" name="paintwork" value="total">Total Repaint</button>
                        <button type="button" class="btn-modalthree" name="paintwork" value="unknown">I Don't Know</button>
                    </div>
                    <p>Interior Condition</p>
                    <div class="button-group">
                        <button type="button" class="btn-modalfour" name="interior_condition" value="excellent">Excellent</button>
                        <button type="button" class="btn-modalfour" name="interior_condition" value="good">Good</button>
                        <button type="button" class="btn-modalfour" name="interior_condition" value="average">Average</button>
                        <button type="button" class="btn-modalfour" name="interior_condition" value="poor">Poor</button>
                    </div>

                    <div class="custom-radio-container">
                        <span class="question">Service History</span>
                        <label class="custom-radio">
                            <input type="radio" name="service_history" value="yes">
                            <span class="checkmark"></span>
                            Yes
                        </label>
                        <label class="custom-radio">
                            <input type="radio" name="service_history" value="no">
                            <span class="checkmark"></span>
                            No
                        </label>
                    </div>

                    <textarea class="form-control mt-3" name="comment" id="exampleFormControlTextarea1" rows="3"
                        placeholder="Comment Here"></textarea>

                    <div class="custom-radio-container">
                        <span class="question">Loan or Mortgage</span>
                        <label class="custom-radio">
                            <input type="radio" name="loan_secured" value="yes">
                            <span class="checkmark"></span>
                            Yes
                        </label>
                        <label class="custom-radio">
                            <input type="radio" name="loan_secured" value="no">
                            <span class="checkmark"></span>
                            No
                        </label>
                    </div>
                    <div class="row mt-2">
                        <button type="button" id="back-button-modal1" class="btn btn-modal-first">
                            Back
                        </button>
                        <button type="button"  id="next-button-modal2" class="btn btn-modal-first" >
                            Next
                        </button>
                    </div>
            </div>
        </div>
    </div>



    <!-- Modal -->

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content image-modal">
                <h3>TELL US ABOUT YOUR CAR</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="custom-image-upload">
                        <h2>Upload Images</h2>
                        <p>Upload images of your car.</p>
                        <div class="custom-upload-box">
                            <label for="custom-file-input" class="custom-upload-label">
                                <div class="custom-upload-icon">⬆</div>
                                <span class="custom-upload-button">Upload Images</span>
                            </label>
                            <input type="file" id="custom-file-input" name="images[]" accept="image/*" multiple style="display: none;" />
                            <p class="custom-upload-info">
                                5 Mb maximum file size accepted in the following formats: jpg, jpeg, png<br>
                                Upload at least 6 images of your car
                            </p>
                            <p id="image-error" class="text-danger" style="display: none;">You must upload at least 6 images!</p>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" id="back-button-modal2" class="btn btn-modal-first">
                            Back
                        </button>
                        <button type="button" class="btn btn-modal-first"  id="next-button-modal3">
                            Next
                        </button>
                    </div>
            </div>
        </div>
    </div>

    <!-- ==================================================================Contact Modal============================================================ -->

    <!-- Button trigger modal -->


    <!-- Modal -->

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content contact-modal">
                <h3>TELL US ABOUT YOUR CAR</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="contact-info-form">
                    <h3>Contact Information:</h3>
                      <div class="form-group">
                        <input type="text" name="first_name" required placeholder="First Name" class="form-control" />
                        <input type="text" name="last_name" placeholder="Last Name" class="form-control" />
                      </div>
                      <div class="form-group">
                        <input type="number" name="phone_number" required placeholder="Phone Number" class="form-control" min="0" maxlength="13" />
                        <input type="email" name="email" placeholder="Email Address" class="form-control" />
                      </div>
                      <div class="form-group">
                        <input style="min-height: 70px;" name="address" type="text" placeholder="Location where car ..." class="form-control full-width" />
                      </div>
                  </div>
                  <div class="row">
                    <button type="button" id="back-button-modal3" class="btn btn-modal-first">
                        Back
                    </button>
                    <button type="button" id = "submitbutton" class="btn btn-modal-first">Submit</button>

                  </div>
            </div>
        </div>
    </div>


<!-- ===========================================================Second Part========================================================================= -->


<div class="second-part container mt-5 mb-5 position-relative overflow-hidden" id="testimonials">
    <div class="row g-3">
        <div class=" col-md-1">
            <h1 class="rotated-heading">شهادات</h1>
        </div>
        <div class="col-md-4 second-text">
            <h4>Testimonials</h4>
            <h1>{{$settings->testimonial_header}}</h1>
            <p>{{$settings->testimonial_description}}</p>
            <button><a href="#exampleModa" style="text-decoration:none;color:black;">Sell Your Car</a></button>
        </div>
        <div class="col-md-7">
            <div class="testimonial-swiper-container">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="card custom-card">
                                    <img src="{{ asset($testimonial->image_path) }}" alt="{{ $testimonial->name }}">
                                    <div class="custom-card-content">
                                        <h3 class="card-title">{{ $testimonial->name }}</h3>
                                        <p class="card-text">{{ $testimonial->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Navigation -->
                    {{-- <div
                        class="swiper-button-next testimonial-swiper-button-next"
                        style="top: 90%; color: black; font-size: 7px;">
                    </div>
                    <div
                        class="swiper-button-prev testimonial-swiper-button-prev"
                        style="top: 90%; color: black; font-size: 7px;">
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
      document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.testimonial-swiper', {
            loop: true, // Ensures infinite looping
            navigation: {
                nextEl: '.testimonial-swiper-button-next',
                prevEl: '.testimonial-swiper-button-prev',
            },
            pagination: {
                el: '.testimonial-swiper-pagination',
                clickable: true, // Enables clickable pagination
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            slidesPerView: 1, // Display 2 slides at a time
            spaceBetween: 20,
            breakpoints: {
                768: {
                    slidesPerView: 1,
                },
                992: {
                    slidesPerView: 2,
                },
            },
        });
    });
    </script>


<!-- ==============================================================Third Part====================================================================== -->

<div class="third-part">
    <div class="main-faq">
        <h3 class="faq-yellow-text">FAQ</h3>
        <h1>{{$settings->faq_header}}</h1>
        <p class="faq-para">{{$settings->faq_description}}</p>
        <div class="faqs-container">
            @foreach ($faqs as $faq)
            <div class="faq ">
                <h3 class="faq-title">{{$faq->question}}</h3>
                <p class="faq-text">{{$faq->answer}}</p>
                <button class="faq-toggle">
                    <i class="fa-solid fa-circle-plus"></i>
                    <i class="fa-solid fa-circle-minus"></i>
                </button>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- ========================================================fourth part=================================================================================== -->
<div class="fourth-part" id="about_us">
    <div class="row fourth-part-div">
        <div class="col-md-6 p-0">
            <div class="left-img">
                <img src="{{ asset($about->image_path) }}" alt="Not Found">
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="right-text">
                <h4 style="color:#d1be0f;">About us</h4>
                <h1>{{$about->name ?? 'The story behind our Journey'}}</h1>
                <p>{{$about->description}}</p>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================fifth part==================================================================== -->

<div class="fifth-part">
    <div class="row">
        <div class="ninty col-md-2">
            <h1 class="rotated-heading-fifth">لماذا نحن؟</h1>
        </div>
        <div class="fifth-text col-md-5 col-sm-12">
            <h1>{{$settings->Uniqueness_header}}</h1>
            <p>{{$settings->Uniqueness_description}}</p>
            <button><a href="#exampleModa" style="text-decoration:none;color:black;">Sell Your Car</a></button>
        </div>
        <div class="fifth-img col-md-5 col-sm-12">
            <img src="images/fifth-im.jpg" alt="noImage">
        </div>
    </div>
</div>


<!-- ============================================================sixth part======================================================================= -->
<style>
    /* Default margin-top for larger screens */
    .custom-margin-top {
        margin-top: 5rem;
    }

    /* For screens smaller than 768px (mobile/tablet) */
    @media (max-width: 768px) {
        .custom-margin-top {
            margin-top: 34rem !important;
        }
    }
</style>
<div class="sixth-part mb-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-9 left-part-six">
                <h5 style="color:#FCE80A;margin-bottom:0;">Blog</h5>
                <h1 class="blog-heading">Maximizing Your Car’s Value! Tips, Tricks, and Industry News!<span><button class="six-btn-1"><a href="#exampleModa" style="text-decoration:none;color:black;">Sell Your Car</a></button>
                    <!-- <button class="six-btn-2">Latest Article</button> -->
                </span></h1>

            </div>
            <div class="col-md-1 ninty" style="height: 35vh">
                <h1 class="rotated-heading-part">مدونة</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="swiper swiper-blog">
                    <div class="swiper-wrapper">
                        @foreach($blogs as $blog)
                            <div class="swiper-slide">
                                <div class="card custom-card">
                                    <img src="{{ asset($blog->image_path) }}" alt="{{ $blog->name }}">
                                    <div class="custom-card-content">
                                        <h3 class="blog-card-title">{{ $blog->name }}</h3>
                                        <p class="blog-card-text">{{ $blog->subtitle }}</p>
                                        <a href="{{ url('blog/view/'.$blog->id.'/'.$blog->name) }}" class="btn btn-transparent text-light border border-light">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-blog', {
            // slidesPerView: 1,
            spaceBetween: 20,
            loop: true, // Enable infinite looping
            autoplay: {
                delay: 3000, // 3 seconds delay between slides
                disableOnInteraction: false, // Keeps autoplay on user interaction
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                // Responsive breakpoints
                425: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                992: { slidesPerView: 3 },
            },
        });
    });
</script>
<div id="mz-gallery-container">
    <div id="mz-gallery">
        @foreach ($mediaItems as $mediaItem)
            @foreach ($mediaItem->images as $image)
                <figure>
                    <img src="{{ $image }}" alt="Marketing Image" width="700" height="700">
                    <figcaption>Marketing Media</figcaption>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </figure>
            @endforeach
        @endforeach
    </div>
</div>




<!-- ============================================================seven part=================================================================== -->
<!-- <div class="container pt-5 overflow-hidden">
    <div class="swiper-container swiper-card">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
            <div class="card custom-card">
                <img src="{{ asset('images/hr.jfif') }}" alt="Card Background Image">
                <div class="custom-card-content  pb-4">
                  <h3 class="card-title ">Card Title</h3>
                  <p class="card-text">This is a description for the card. It provides some details about the content.</p>
                  <a href="#" class="btn btn-transparent text-light border border-light">Read More</a>
                </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="card custom-card">
              <img src="{{ asset('images/gp.jfif') }}" alt="Card Background Image">
              <div class="custom-card-content">
                <h3 class="card-title">Card Title</h3>
                <p class="card-text">This is a description for the card. It provides some details about the content.</p>
                <a href="#" class="btn btn-transparent text-light border border-light">Read More</a>
              </div>
            </div>
        </div>
        <div class="swiper-slide">
          <div class="card custom-card">
              <img src="{{ asset('images/pc.jfif') }}" alt="Card Background Image">
              <div class="custom-card-content">
                <h3 class="card-title">Card Title</h3>
                <p class="card-text">This is a description for the card. It provides some details about the content.</p>
                <a href="#" class="btn btn-transparent text-light border border-light">Read More</a>
              </div>
            </div>
        </div>
        <div class="swiper-slide">
          <div class="card custom-card">
              <img src="{{ asset('images/gp.jfif') }}" alt="Card Background Image">
              <div class="custom-card-content">
                <h3 class="card-title">Card Title</h3>
                <p class="card-text">This is a description for the card. It provides some details about the content.</p>
                <a href="#" class="btn btn-transparent text-light border border-light">Read More</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- Include SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      // Initialize Swiper
   const swiper = new Swiper('.swiper-test', {
     slidesPerView: 6, // Number of slides to show at once on larger screens
     spaceBetween: 0, // Space between the slides (increased for better clarity)
     loop: true, // Infinite loop for slides

     breakpoints: {
       0: {
         slidesPerView: 1, // Show 1 slide on very small mobile screens
       },
       576: {
         slidesPerView: 1, // Show 2 slides on slightly larger mobile screens
       },
       768: {
         slidesPerView: 2, // Show 3 slides on tablets
       },
       1024: {
         slidesPerView: 2, // Maintain 3 slides on desktops and larger screens
       },
     },
   });
     // Initialize Swiper
     const swiper2 = new Swiper('.swiper-blog', {
     slidesPerView: 3, // Number of slides to show at once on larger screens
     spaceBetween: 0, // Space between the slides (increased for better clarity)
     loop: true, // Infinite loop for slides

     breakpoints: {
       0: {
         slidesPerView: 1, // Show 1 slide on very small mobile screens
       },
       576: {
         slidesPerView: 1, // Show 2 slides on slightly larger mobile screens
       },
       768: {
         slidesPerView: 3, // Show 3 slides on tablets
       },
       1024: {
         slidesPerView: 3, // Maintain 3 slides on desktops and larger screens
       },
     },
   });

     </script>
<!-- ===========================================================eight part================================================================== -->

<!-- <div class="eight-part container my-5">
    <div class="row text-center">
        <div class="col-md-4">
            <img src="images/habd.png" style="max-width:100%;height: 200px;" class="mb-2" alt=""><br>
            <span class="h3" >Instant Payment</span ><br>
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor</p>
        </div>
        <div class="col-md-4">
            <img src="images/process.png" style="max-width:100%;height: 200px;" class="mb-2" alt=""><br>
            <span class="h3" >Hassle-Free Process</span >
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor</p>
        </div>
        <div class="col-md-4">
            <img src="images/Frame.png" style="max-width:100%;height: 200px;" class="mb-2" alt=""><br>
            <span class="h3" >Certified and Trusted</span >
            <p class="mt-3">Lorem ipsum dolor sit amet consectetur. Massa nunc cras nisl pellentesque integer sed. In tortor</p>
        </div>
    </div>
</div> -->
<script src="{{ asset('js/faq.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    // -----------------------For Car type and Car Model Drop Down
    document.addEventListener('DOMContentLoaded', function () {

    const carTypeSelect = document.getElementById('car_type');
    const modelSelect = document.getElementById('model');

    carTypeSelect.addEventListener('change', function () {
        const carTypeId = this.value;

        // Clear previous models
        modelSelect.innerHTML = '<option value="" selected disabled>Model of Car</option>';

        if (carTypeId) {
            fetch(`/get-models?car_type_id=${carTypeId}`)
                .then(response => response.json())
                .then(models => {
                    for (const [id, name] of Object.entries(models)) {
                        const option = document.createElement('option');
                        option.value = id;
                        option.textContent = name;
                        modelSelect.appendChild(option);
                    }
                })
                .catch(error => console.error('Error fetching models:', error));
        }
    });
});

</script> --}}


<script>
    $(document).ready(function () {
        // Load makes dynamically
        $.get('/car-makes', function (makes) {

            $('#make-dropdown').append(makes.map(make => `<option value="${make.id}">${make.name}</option>`));
        });

        // // Load years dynamically based on selected make

        // $('#make-dropdown').change(function () {
        //     const makeId = $(this).val();
        //     $('#year-dropdown').empty().append('<option value="">Select Year</option>');
        //     $('#model-dropdown').empty().append('<option value="">Select Model</option>');

        //     if (makeId) {
        //         $.get(`/car-years/${makeId}`, function (years) {
        //             $('#year-dropdown').append(years.map(year => `<option value="${year.id}">${year.year}</option>`));
        //         });
        //     }
        // });

        // // Load models dynamically based on selected make and year
        
        // $('#year-dropdown').change(function () {
        //     const makeId = $('#make-dropdown').val();
        //     const yearId = $(this).val();
        //     $('#model-dropdown').empty().append('<option value="">Select Model</option>');

        //     if (makeId && yearId) {
        //         $.get(`/car-models/${makeId}/${yearId}`, function (models) {
        //             $('#model-dropdown').append(models.map(model => `<option value="${model.id}">${model.name}</option>`));
        //         });
        //     }
        // });
    });
</script>

<script>
    document.querySelector('input[name="phone_number"]').addEventListener('input', function (e) {
    if (this.value.length > 14) {
        this.value = this.value.slice(0, 14); // Limit to 10 digits
    }
});
</script>
<script>

// {{-- -----------------------------For button input selection------------------------------ --}}

document.addEventListener('DOMContentLoaded', () => {
    const selectedData = {};

    document.querySelectorAll('.button-group button').forEach(button => {
        button.addEventListener('click', function () {
            // Remove active class from sibling buttons
            const siblings = this.parentElement.querySelectorAll('button');
            siblings.forEach(sibling => sibling.classList.remove('active'));

            // Add active class to clicked button
            this.classList.add('active');

            // Save the selected value
            const groupName = this.parentElement.previousElementSibling.textContent.trim(); // Group label
            selectedData[groupName] = this.textContent.trim();
        });
    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let modalData = {};

        // Modal 1 - Collect car info
        document.getElementById("next-button-modal1").addEventListener("click", function() {
            modalData.car_info = {
                car_type: $("select[name='car_type']").val() || '',
                model: $("input[name='model']").val() || '',
                specification: $("input[name='specification']").val(),
                engine_size: $("input[name='engine_size']").val(),
                year: $("select[name='year']").val(),
                kilometers: $("input[name='kilometers']").val(),
            };
            // Move to next modal
            $("#exampleModal").modal("show");
        });

        $("#back-button-modal1").click(function () {
        // Close the current modal
            $("#exampleModal").modal("hide");

        });

        $("#back-button-modal2").click(function () {
        // Close the current modal
            $("#exampleModal1").modal("hide");

            // Open the previous modal
            $("#exampleModal").modal("show");
        });

        $("#back-button-modal3").click(function () {
        // Close the current modal
            $("#exampleModal2").modal("hide");

            // Open the previous modal
            $("#exampleModal1").modal("show");
        });

        // Modal 2 - Collect additional data and move to next modal
        $("#next-button-modal2").click(function () {
            modalData.additional_questions = {
                gcc_spec: $("button[name='gcc_spec'].active").val() || '',
                condition: $("button[name='condition'].active").val() || '',
                paintwork: $("button[name='paintwork'].active").val() || '',
                interior_condition: $("button[name='interior_condition'].active").val() || '',
                service_history: $("input[name='service_history']:checked").val() || '',
                comment: $("textarea[name='comment']").val(),
                loan_secured: $("input[name='loan_secured']:checked").val() || '',
            };
            // Move to next modal
            $("#exampleModal").modal("hide");
            $("#exampleModal1").modal("show");
        });

        // Modal 3 - Collect image data and move to next modal
        $("#next-button-modal3").click(function () {
            let images = [];
            let totalSize = 0; // Corrected the array initialization
            let isValid = true;
            let fileInput = document.getElementById("custom-file-input");
                // Loop through files in the file input
                Array.from(fileInput.files).forEach(file => {
                    if (!['image/jpeg', 'image/png', 'image/jpg'].includes(file.type)) {
                Swal.fire({
                    title: 'Invalid File Type!',
                    text: 'Please upload images in JPEG or PNG format.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                isValid = false;
                return;
                }
                    // Validate image size (5MB max)
                    totalSize += file.size;
                    if (totalSize > 10 * 1024 * 1024) {
                        Swal.fire({
                            title: 'Total File Size Exceeded!',
                            text: 'The total size of all images must not exceed 5MB.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                        totalSize -= file.size; // Rollback last addition
                        isValid = false;
                        return;
                    }
                    images.push(file);  // Push file object, not the file name
                });
                if (isValid) {
                    modalData.images = images; // Save only if all validations pass

                    // Move to the next modal
                    $("#exampleModal1").modal("hide");
                    $("#exampleModal2").modal("show");
                } else {
                    // If invalid, stay on the current modal
                    console.log('Validation failed. Staying on the same modal.');
                }
        });

        // Modal 4 - Collect contact data and submit everything

            $("#submitbutton").click(function () {
                // Get values of the required fields
                var firstName = $("input[name='first_name']").val().trim();
                var phoneNumber = $("input[name='phone_number']").val().trim();

                // Check if required fields are empty
                if (firstName === "" || phoneNumber === "") {
            // If either required field is empty, show a SweetAlert warning
            Swal.fire({
                title: 'Required Fields Missing!',
                text: 'Please fill in both First Name and Phone Number.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        } else {
            // If all required fields are filled, proceed with the modal data collection
            modalData.contact_info = {
                first_name: firstName,
                last_name: $("input[name='last_name']").val(),
                phone_number: phoneNumber,
                email: $("input[name='email']").val(),
                address: $("input[name='address']").val(),
            };


            $("#exampleModal2").modal("hide");

            // Prepare FormData object for file uploads
            let formData = new FormData();
            // Append all the data into formData
            for (let key in modalData.car_info) {
                formData.append('car_info[' + key + ']', modalData.car_info[key]);
            }

            for (let key in modalData.additional_questions) {
                formData.append('additional_questions[' + key + ']', modalData.additional_questions[key]);
            }

            for (let key in modalData.contact_info) {
                formData.append('contact_info[' + key + ']', modalData.contact_info[key]);
            }

            // Append the images (file objects) to formData
            modalData.images.forEach(function (file, index) {
                formData.append('images[]', file);
            });

            // CSRF token setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Send all the collected data via AJAX
            $.ajax({
                url: '/car-details/store',  // Replace with your store route URL
                type: 'POST',
                data: formData,
                processData: false,  // Don't process the files
                contentType: false,  // Let the browser set the content type
                success: function (response) {
                    // SweetAlert for success
                    Swal.fire({
                        icon: 'success',
                        title: 'Thank you for your inquiry!',
                        text: 'Mathew will come back to you soon.',
                        showConfirmButton: true
                    });
                    // Optionally redirect or reset modal data
                    modalData = {};
                    // Clear all inputs in the modals
                    $('input').val(''); // Clear all input fields
                    $('textarea').val(''); // Clear all textarea fields
                    $('select').prop('selectedIndex', 0); // Reset select inputs
                    $('button').removeClass('active'); // Remove active class from buttons
                    $('#custom-file-input').val(''); // Clear file input

                    // Hide all modals
                    $('.modal').modal('hide');
                },
                error: function (xhr, status, error) {
                    // SweetAlert for error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error occurred while saving data!',
                        showConfirmButton: true
                    });
                }
            });
        }
        });
    });

</script>

@endsection


