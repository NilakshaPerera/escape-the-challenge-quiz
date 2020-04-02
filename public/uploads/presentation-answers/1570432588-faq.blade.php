@extends('layouts.app')
@section('content')

<div class="container">
    <div class=" h-spacer"></div>
    <div class="" id="about-us" name="about-us">
        <div class="container justify-content-center ">

            <h2 class="text-center">{{ __('Frequently Asked Questions') }}</h2>
            <h3 class="mt-4"><u>General Questions</u></h3>

            <h6><b>1. What is RTI?</b></h6>
            <p>
                Right to Information is a fundamental right that allows citizens to access information held by the public/government authorities.
            </p>

            <h6><b>2.What is “information” under the RTI Act?</b></h6>
            <p>
                As per the Act “information” includes any material which is recorded in, in any form including records, documents, memos, emails, opinions, advices, press releases, circulars, orders, log books, contracts, reports, papers, samples, models, correspondence, memorandum, draft legislation, book, plan, map, drawing, diagram, pictorial or graphic work, photograph, film, microfilm, sound recording, video tape, machine readable record, computer records and other documentary material, regardless of its physical form or character and any copy thereof;”
            </p>

            <h6><b>3.What kind of questions can we ask from RTI?</b></h6>
            <p>
                Any question of public interest related to institutions interpreted in Section 43 of the RTI Act.
            </p>

            <h6><b>4.Who is the information officer?</b></h6>
            <p>
                An information officer is a designated officer in every organization that is to provide requested information appointed under section 23 of the RTI Act. 
            </p>

            <h6><b>5.Who is the designated officer?</b></h6>
            <p>
                Designated officer is the officer appointed in a public authority to whom you could appeal to if the information officer fails/refuses to provide information. They are appointed under <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-23' }}">section 23</a> of the RTI Act.
            </p>

            <h6><b>6.What is a public authority?</b></h6>
            <p>
                “public authority” means –
            <ol type="a">
                <li>
                    a Ministry of the Government;
                </li>
                <li>
                    any body or office created or established by or under the Constitution, any written law, other than the Companies Act No. 7 of 2007, except to the extent specified in paragraph (e), or a statute of a Provincial Council;
                </li>
                <li>
                    a Government Department; 
                </li>
                <li>
                    a public corporation;
                </li>
                <li>
                    a company incorporated under the Companies Act, No. 7 of 2007, in which the State, or a public corporation or the State and a public corporation together hold twenty five per centum or more of the shares or otherwise has a controlling interest; Right to Information Act, No. 12 of 2016 31 
                </li>
                <li>
                    a local authority;
                </li>
                <li>
                    a private entity or organisation which is carrying out a statutory or public function or service, under a contract, a partnership, an agreement or a license from the government or its agencies or from a local body, but only to the extent of activities covered by that statutory or public function or service; 
                </li>
                <li>
                    any department or other authority or institution established or created by a Provincial Council;
                </li>
                <li>       
                    non-governmental organisations that are substantially funded by the government or any department or other authority established or created by a Provincial Council or by a foreign government or international organisation, rendering a service to the public in so far as the information sought relates to the service that is rendered to the public;
                </li>

                <li>
                    higher educational institutions including private universities and professional institutions which are established, recognised or licensed under any written law or funded, wholly or partly, by the State or a public corporation or any statutory body established or created by a statute of a Provincial Council;
                </li>
                <li> 
                    private educational institutions including institutions offering vocational or technical education which are established, recognised or 32 Right to Information Act, No. 12 of 2016 licensed under any written law or funded, wholly or partly, by the State or a public corporation or any statutory body established or created by a statute of a Provincial Council;
                </li>
                <li> 
                    all courts, tribunals and institutions created and established for the administration of justice;
                </li>
            </ol>
            </p>
            <h6><b>7.What is the appeal process?</b></h6>
            <p>
                An appeal can be filed to a designated officer within fourteen days of the refusal, act or date of becoming aware of the grounds on which the appeal is sought to be made as per <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-31' }}">section 31</a> of the RTI Act.
            </p>

            <h6><b>8.What is the role of the RTI commission?</b></h6>
            <p>
                RTI Commission is the body that appeals against a decision made by a designated officer. 
            <ol type="a"> 
                <li>It hears and determined the appeals made to it by the public.</li>
                <li>Holds inquiries and gets people to appear before the commission.</li>
                <li>Requests a person to provide information in his/her possession if necessary</li>
                <li>Inspects any information held by a public authority or information withheld by   such an authority and to direct the publishing of information which are of public interest.</li>
                <li>Directs public authorities to provide information in a particular form</li>
                <li>Directs a public authority to reimburse fees charged from citizens if information was not provided within the stipulated time.</li>
            </ol>
            </p>

            <h6><b>9.What are the questions that we cannot ask under RTI?</b></h6>
            <p>
                Although RTI gives access to information there are limitations to the rule if the requested information is related to personal information the disclosure of which will be of no public interest or benefit.
                Any information that undermine the defence of the State or threatens its security will be denied.
                Information related to Sri Lanka’s international relations with any other country will be denied as well.
                Denial of access to information under <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-5' }}">section 5</a> of the Act provides detailed explanation.
            </p>

            <h6><b>10.Can any citizen request for information under RTI?</b></h6>
            <p>
                Yes. A citizen is a person who has acquired citizenship through birth or registration. An organization with ¾ of the membership is of Sri Lankan citizens can also request information. 
            </p>

            <h6><b>11.Can we question every government organization under RTI?</b>
                <p>
                    Yes
                </p>
                <h6><b>12.Can we question private organizations under RTI?</b></h6>
                <p>
                    No
                </p>

                <h6><b>13.Can we file several RTI applications to a singular matter?</b></h6>
                <p>
                    Yes. 
                </p>

                <h6><b>14.Is there a payment for applications?</b></h6>
                <p>
                    No. However there is a payment involved when receiving information as prescribed by the relevant public authority at the failure of which the fee schedule of Extraordinary Gazette No.2004/66 ill apply. 
                </p>

                <h6><b>15.Is information related to security forces permissible under the RTI act?</b></h6>
                <p>
                    No. Information related to security forces do not fall under accessible information. 
                </p>

                <h6><b>16.Are there organizations exempted from providing information?</b></h6>
                <p>
                    No there are no organizations exempted from providing information as long as the product or the service the organization provide involves public interest.
                </p>

                <h6><b>17.How does filing an RTI benefit me?</b></h6>
                <p>
                    The information requested/ received will serve the immediate community of the applicant in fulfilling transparency, accountability and good governance of the nation.
                </p>

                <h6><b>18.What government entities can I question under RTI?</b></h6>
                <p>
                    Any government entity that serves the public can be questioned under RTI.
                </p>

                <h6><b>19.Is there an age limit to use RTI?</b></h6>
                <p>
                    No. Any citizen without a restriction of age can file an RTI.
                </p>

                <h6><b>20.Should I always have a personal interest regarding the information I request?</b></h6>
                <p>
                    No. There is no such restriction. You may file a RTI regarding any issue of concerning the government processes of public interest and personal issues. 
                </p>

                <h6><b>21.Can I get information without filing a formal application?</b></h6>
                <p>
                    Yes. You can receive information under RTI even if you mention so in a letter.
                </p>

                <h6><b>22.Should I always file a formal application to request information?</b></h6>
                <p>
                    No, as is explained in answer 21.
                </p>

                <h6><b>23.Can respective entities be penalized under the RTI act?</b></h6>
                <p>
                    As per <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-39' }}">section 39</a> of the RTI Act an alleged offender can be penalized as he/she will be liable to, 
                    -a fine not exceeding Rs. 50,000 or an imprisonment not exceeding 2 years
                    or both the fine and imprisonment aforementioned. 
                </p>
                <p>
                    The offences are, deliberately providing incorrect, inaccurate or incomplete information, destroying, invalidating, altering or concealing information, refusing or failing to appear before the commission when requested, failure or refusal to comply with a decision of the commission, obstructing the procedure of the commission, and not enforcing a decision made by the commission. 
                </p>

                <h3 class="mt-4"><u>Questions related to process</u></h3>

                <h6><b>1.Can an information officer not respond to a RTI application?</b></h6>
                <p>
                    No. He is bound by the law under <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-23' }}">section 23</a> of the RTI Act to provide requested information. 
                </p>

                <h6><b>2.How do I go forward if information is denied?</b></h6>
                <p>
                    Make an appeal to the Designated officer within 14 days of your request’s denial. Read sections 
                    <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-31' }}">31</a>
                    , 
                    <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-32' }}">32</a>
                    , 
                    <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-34' }}">34</a>
                    of the Act for more information. 
                </p>

                <h6><b>3.What should I do if the information officer asks to meet without providing a written answer?</b></h6>
                <p>
                    As the information officer is not authorized to do so, you should file an appeal.
                </p>

                <h6><b>4.How long does it take for an application to process?</b></h6>
                <p>
                    If information could be provided immediately it would be done so by the Information officer.
                    Either refusal or acceptance of the RTI request should be made within 14 working days by the information officer. 
                    If the requested information concerns liberty of citizen information should be granted within 48 hours of request.
                    Read <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-25' }}">section 25</a> of the Act for more information. 
                </p>
                <h6><b>5.Should applications always be posted? Are online submissions accepted?</b></h6>
                <p>
                    Online submissions are accepted as well. 
                </p>
                <h6><b>6.What is the entire RTI application process?</b></h6>
                <p>
                    <img style="width: 100%; height: auto" src="{{ url('/') . '/images/faq/application-process.jpg' }}">
                </p>
                <h6><b>7.How can I keep track of the progress of an application process?</b></h6>
                <p>
                    Use the receipt provided to follow up on the case that was filed at the receipt of information. If there was no response received, appeal to the Designated officer.
                </p>

                <h6><b>8.What can I do if the received information is not satisfactory?</b></h6>
                <p>
                    Appeal to the Designated Officer.
                </p>

                <h6><b>9.In what form can I get information? Eg: letters, books, emails, excerpts from documents etc.</b></h6>
                <p>
                    In the form of notes, extracts or certified copies of documents or records, certified samples of material.
                    information can be obtained in the form of CD/DVD/storage media/tapes/video cassettes/ any other electronic mode/ printouts where such information is stored in a computer or in any other device
                </p>

                <h6><b>10.From where can I download an application form?</b></h6>
                <P>
                    Visit <a target="_blank" href="http://rtisrilanka.lk/">www.rtisrilanka.lk</a>
                    Websites of RTI commission, government information or even you can make one.
                </p>

                <h6><b>11.Can I send a hand written application?</b></h6>
                <p>
                    Yes you can. However, make sure that you obtain a receipt at the submission of your application.
                </p>

                <h6><b>12.Can I obtain information in the medium I desire?</b></h6>
                <p>
                    Yes. You will be provided service in all three languages as per the national language policy.
                </p>

                <h6><b>13.What if I do not appeal within the stipulated time?</b></h6>
                <p>
                    Your application will be rejected.
                </p>

                <h6><b>14.To whom should the application forms be addressed?</b></h6>
                <p>
                    Always apply to the Information Officer.<br>
                    Ex; Information Officer<br>
                    (Name of the Public authority/Government organization)<br>
                    (Adress of the Organization)
                </p>

                <h6><b>15.What information can I get free of charge?</b></h6>
                <p>
                    Yes. the first four pages of a photocopied or printed document will be free of charge. 
                    As per the <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-25' }}">section 25 (4)</a> of the Act more details about payments are observed. 
                </p>

                <h6><b>16.Is the information I receive under RTI always accurate?</b></h6>
                <p>
                    Providing inaccurate information is an offense under <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-39' }}">section 39 (1) (a)</a> of the Act. You can make a complaint to the commission if inaccurate information is provided. You can ask for certified information when you apply. 
                </p>

                <h3><u>Questions on Appeals</u></h3>

                <h6><b>1.What is the appeal process?</b></h6>
                <img style="width: 100%; height: auto" src="{{ url('/') . '/images/faq/appeal-process.jpg' }}">

                <h6><b>2.If an officer fails to provide information what should I do?</b></h6>
                <p>
                    You can appeal against a Designated officer to the commission. Refer <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-32' }}">section 32</a> of the Act.
                </p>

                <h6><b>3.What if I do not appeal within the stipulated time?</b></h6>
                <p>
                    Your appeal will be rejected. The application will have to be filed againif you wish to further pursue.
                </p>

                <h6><b>4.Can I make a complaint to the Supreme Court under RTI?</b></h6>
                <p>
                    Yes. You can go to Supreme Courts for violation of fundamental rights.
                </p>

                <h3><u>Questions on Privacy</u></h3>
                <h6><b>1.Will there be any negative repercussions in after filing an RTI?</b></h6>
                <p>
                    No authority or individual can question your right to exercise the law. You will not be held accountable for filing RTI. 
                </p>

                <h6><b>2.Can the received information be published?</b></h6>
                <p>
                    Yes. Refer <a target="_blank" href="{{ url("/".LaravelLocalization::getCurrentLocale()). '/rtiact#section-36' }}">section 36</a> of the RTI Act
                </p>

                <h6><b>3.Can the information be used as evidence for other purposes?</b></h6>
                <p>
                    Yes, Obtained information can be used as evidence.
                </p>

                <h6><b>4.Will my personal details remain confidential when filing an RTI?</b></h6>
                <p>
                    Yes. It is the duty of the information officer to keep such information confidential
                </p>
        </div>
    </div>
    <div class=" h-spacer"></div>
</div>

@endsection