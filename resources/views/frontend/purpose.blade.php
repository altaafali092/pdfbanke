@extends('frontend.layouts.master')
@section('main-container')
    <div class="container-fluid py-2">
        <a href="{{url('index')}}"><i class="fa fa-home" style="font-size: 16px;"> > उदेश्य</i></a>
    </div>
    <div class="container-fluid">
        <div class="text-white" style="background-color:blue; padding:10px;  height: 45px; width: 100%;">
            <i class="fa fa-clipboard" style="font-size: 18px;"> उदेश्य</i>
        </div>
    </div>
    <div class="container fluid py-3">
       <ul style="font-size: 16px;">
        <li>
            <span>
                सहकारीको सिद्धान्त र मूल्यहरूको प्रवर्द्वन गर्दै सहकारीमा आधारित उत्पादन, उद्यम र सेवा व्यवसायको विकास र विस्तार गरी प्रदेशको दिगो र समतामूलक आर्थिक सामाजिक विकासमा योगदान पुर्‍याउने । 
            </span>
        </li>
        <li>
            <span>
                कृषि क्षेत्रमा आधुनिक प्रविधिको प्रयोग गर्दै प्रतिष्पर्धात्मक क्षमता हासिल गरी उत्पादन र उत्पादकत्व अभिवृद्धि गर्नुका साथै कृषिजन्य उद्योगलाई प्रवर्द्वन गर्ने ।
            </span>
        </li>
        <li>
            <span>
                पशुपछिं पालनमा प्रविधिको प्रयोगलाई प्रोत्साहन गर्दै व्यवसायिक, प्रतिस्पर्धी एवं स्वस्थ पशुपछिं उत्पादनको सुनिश्चितता एवं पशुपन्छीजन्य उत्पादनमा आत्मनिर्भरता हासिल गरी यस क्षेत्रलाई आय आर्जनका साथै रोजगारीको माध्यमका रुपमा विकास गर्ने ।
            </span>
        </li>
       </ul>
    </div>
@endsection
