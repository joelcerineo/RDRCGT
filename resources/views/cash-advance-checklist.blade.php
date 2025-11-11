<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cash Advances Checklist</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
  /* Sub-nested static item */
  .sub-static span:first-child {
    display: inline-block;
    width: 1rem;
  }
</style>
</head>
<body class="font-sans antialiased bg-gray-50 p-6">

<div class="max-w-5xl mx-auto bg-white shadow-lg rounded-xl p-6 sm:p-8">

  <!-- Header -->
  <header>
    <h1 class="text-2xl md:text-3xl font-bold text-blue-900 mb-6">1.0 Cash Advances</h1>
    <div class="flex flex-wrap gap-3 mb-8 border-b pb-6 border-gray-200">
      <button id="btn-1-1" class="px-4 py-2 rounded-lg bg-blue-700 text-white shadow-md text-sm sm:text-base">1.1 Granting of Cash Advances</button>
      <button id="btn-1-2" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300 text-sm sm:text-base">1.2 Liquidation of Cash Advances</button>
    </div>
  </header>

  <!-- Main Content -->
  <main id="main-content">
    <!-- Granting Section -->
    <div id="section-1-1">
      <div class="text-gray-800 leading-relaxed space-y-6">
        <h2 class="text-xl font-semibold text-blue-900">1.1 Granting of Cash Advances</h2>
        <p>The rules and regulations on the grant and liquidation of cash advances are prescribed under COA Circular No. 97-002 dated February 10, 1997 and reiterated in COA Circular No. 2009-002 dated May 18, 2009 and Section 89 of PD No. 1445. These guidelines provide, among others:</p>

        <!-- General Guidelines -->
        <div class="space-y-4">
          <h3 class="font-bold text-gray-800">General Guidelines</h3>
          <ul class="list-disc list-inside space-y-2 pl-4">
            <li>No cash advance shall be given unless for a legally authorized specific purpose.</li>
            <li>No additional cash advances shall be allowed to any official or employee unless the previous cash advance given to him is first liquidated and accounted for in the books.</li>
            <li>No cash advance shall be granted for payments on account of infrastructure projects or other undertaking on a project basis.</li>
            <li>A cash advance shall be reported as soon as the purpose for which it was given has been served.</li>
            <li>Only permanently appointed officials shall be designated as disbursing officers. Elected officials may be granted a cash advance only for their official traveling expenses.</li>
            <li>Transfer of cash advances from one Accountable Officer to another shall not be allowed.</li>
          </ul>
        </div>

        <!-- Checklist Helper -->
        <script>
          function createCheckbox(id, text) {
            const label = document.createElement('label');
            label.className = "flex items-start space-x-3 text-gray-800";
            const input = document.createElement('input');
            input.type = "checkbox";
            input.id = id;
            input.className = "mt-1 h-4 w-4 shrink-0 text-blue-700 border-gray-400 rounded focus:ring-blue-500 focus:ring-2";
            const span = document.createElement('span');
            span.innerHTML = text;
            label.appendChild(input);
            label.appendChild(span);
            return label;
          }

          function createNestedList(id, text, children) {
            const li = document.createElement('li');
            li.className = "ml-6 list-none";
            const label = document.createElement('label');
            label.className = "flex items-start space-x-3 text-gray-700";
            const input = document.createElement('input');
            input.type = "checkbox";
            input.id = id;
            input.className = "mt-1 h-4 w-4 shrink-0 text-blue-700 border-gray-400 rounded focus:ring-blue-500 focus:ring-2";
            const span = document.createElement('span');
            span.innerHTML = text;
            label.appendChild(input);
            label.appendChild(span);
            li.appendChild(label);

            if (children && children.length) {
              const ul = document.createElement('ul');
              ul.className = "mt-2 space-y-2";
              children.forEach(child => {
                if (child.type === "static") {
                  const staticLi = document.createElement('li');
                  staticLi.className = "sub-static ml-12 flex items-start space-x-3 text-gray-600";
                  const dash = document.createElement('span');
                  dash.textContent = "-";
                  const spanText = document.createElement('span');
                  spanText.innerHTML = child.text;
                  staticLi.appendChild(dash);
                  staticLi.appendChild(spanText);
                  ul.appendChild(staticLi);
                } else {
                  ul.appendChild(createNestedList(child.id, child.text, child.children));
                }
              });
              li.appendChild(ul);
            }
            return li;
          }
        </script>

        <!-- Common Checklist -->
        <div class="space-y-4">
          <h3 class="font-bold text-gray-800">Documentary Requirements common to all cash advances except for travels</h3>
          <ul id="common-checklist" class="space-y-2 list-none pl-0">
            <script>
              const commonItems = [
                {id: "g-c-1", text: "Authority of the accountable officer issued by the Head of the Agency or his duly authorized representative indicating the maximum accountability and purpose of cash advance (for initial cash advance)"},
                {id: "g-c-2", text: "Certification from the Accountant that previous cash advances have been liquidated and accounted for in the books"},
                {id: "g-c-3", text: "Approved application for bond and/or Fidelity Bond for the year for cash accountability of ₱2,000 or more"},
              ];
              const commonList = document.getElementById("common-checklist");
              commonItems.forEach(item => commonList.appendChild(createCheckbox(item.id, item.text)));
            </script>
          </ul>
        </div>

        <!-- Payroll Checklist -->
        <div class="space-y-4">
          <h3 class="text-lg font-semibold text-blue-900">1.1.1 Payroll Fund for Salaries, Wages, Allowances, Honoraria and Other Similar Expenses</h3>
          <p>The cash advance for payroll fund shall be equal to the net amount of the payroll for the pay period.</p>
          <h4 class="font-semibold">Additional Documentary Requirements:</h4>
          <ul id="payroll-checklist" class="space-y-2 list-none pl-0">
            <script>
              const payrollItems = [
                {id: "g-p-1", text:"Approved contracts (for initial payment)"},
                {id: "g-p-2", text:"Approved Payroll or list of payees indicating their net payments"},
                {id: "g-p-3", text:"Approval/authority (presidential directive or legislative enactment) or legal basis to pay any allowance/salaries/wages/fringe benefits"},
                {id: "g-p-4", text:"Daily time record (DTR) approved by the supervisor"},
              ];
              const payrollList = document.getElementById("payroll-checklist");
              payrollItems.forEach(item => payrollList.appendChild(createCheckbox(item.id, item.text)));
            </script>
          </ul>
        </div>

        <!-- PCF Checklist -->
        <div class="space-y-4">
          <h3 class="text-lg font-semibold text-blue-900">1.1.2 Petty Cash Fund (PCF)</h3>
          <p>The PCF to be set up shall be sufficient for the recurring petty operating expenses of the agency for one month. Payments out of PCF, which shall be made through a Petty Cash Voucher, shall be allowed only for amounts not exceeding ₱15,000 for each transaction.</p>
          <ul id="pcf-checklist" class="space-y-2 list-none pl-0">
            <script>
              const pcfItems = [
                {id:"g-pcf-1", text:"Approved estimates of petty expenses for one month"},
                {id:"g-pcf-2", text:"Copy of policy for maintaining PCF under the imprest system for GOCCs"}
              ];
              const pcfList = document.getElementById("pcf-checklist");
              pcfItems.forEach(item => pcfList.appendChild(createCheckbox(item.id, item.text)));
            </script>
          </ul>
        </div>

        <!-- COE Checklist -->
        <div class="space-y-4">
          <h3 class="text-lg font-semibold text-blue-900">1.1.3 Field/Activity Current Operating Expenses (COE)</h3>
          <p>The amount of the cash advance shall be limited to the requirements for two months.</p>
          <ul id="coe-checklist" class="space-y-2 list-none pl-0">
            <script>
              const coeItems = [{id:"g-coe-1", text:"Approved Budget for COE of the agency field office or agency activity in the field"}];
              const coeList = document.getElementById("coe-checklist");
              coeItems.forEach(item => coeList.appendChild(createCheckbox(item.id, item.text)));
            </script>
          </ul>
        </div>

        <!-- Traveling Checklist -->
        <div class="space-y-4">
          <h3 class="text-lg font-semibold text-blue-900">1.1.4 Traveling Allowances</h3>
          <h4 class="font-semibold">General Guidelines</h4>
          <ul class="list-disc list-inside space-y-2 pl-4">
            <li>Under Section 2, Executive Order (EO) No. 248 dated May 29, 1995...</li>
            <li>No government fund shall be utilized to defray foreign travel expenses...</li>
          </ul>

          <!-- Local Travel -->
          <div class="pl-4 mt-4 space-y-4">
            <h5 class="font-semibold text-lg">1.1.4.1 Local Travel</h5>
            <p class="font-semibold text-gray-700">Documentary Requirements:</p>
            <ul id="local-travel-checklist" class="space-y-2 list-none pl-0">
              <script>
                const localTravelItems = [
                  {id:"g-lt-1", text:"Office Order/Travel Order approved in accordance with Section 3 of EO No. 298"},
                  {id:"g-lt-2", text:"Duly approved itinerary of travel"},
                  {id:"g-lt-3", text:"Certification from the accountant that the previous cash advance has been liquidated and accounted for in the books"}
                ];
                const localTravelList = document.getElementById("local-travel-checklist");
                localTravelItems.forEach(item => localTravelList.appendChild(createCheckbox(item.id, item.text)));
              </script>
            </ul>
          </div>

          <!-- Foreign Travel -->
          <div class="pl-4 mt-4 space-y-4">
            <h5 class="font-semibold text-lg">1.1.4.2 Foreign Travel</h5>
            <p class="font-semibold text-gray-700">Documentary Requirements:</p>
            <ul id="foreign-travel-checklist" class="space-y-2 list-none pl-0">
              <script>
                const foreignTravelItems = [
                  {
                    id:"g-ft-1",
                    text:"Office Order/Travel Order approved in accordance with the provisions of Sections 1 and 2 of EO No. 459 dated September 1, 2005",
                    children:[
                      {
                        id:"g-ft-1a",
                        type:"nested",
                        text:"As approved by the Office of the President in case of the following officials:",
                        children:[
                          {id:"g-ft-1a1", type:"static", text:"Members of the cabinet and officials of equivalent rank"},
                          {id:"g-ft-1a2", type:"static", text:"Heads of GOCCs and GFIs under or attached to the Office of the President"},
                          {id:"g-ft-1a3", type:"static", text:"Heads of agencies under or attached to the Office of the President (OP)"},
                          {id:"g-ft-1a4", type:"static", text:"The Chief Justice and Associate Justices of the Supreme Court were exempted under Memorandum Order No. 26 dated July 31, 1986. Under EO No. 477 dated August 21, 1991, the Chairman and Commissioners of the Constitutional Commissions, Chairman and Members of the Commission on Human Rights, Ombudsman and Deputy Ombudsmen were also exempted from securing prior approval from the Office of the President in connection with travels abroad."}
                        ]
                      },
                      {
                        id:"g-ft-1b",
                        type:"nested",
                        text:"As approved by the respective heads of agencies in the case of other government officials and employees regardless of the length of travel:",
                        children:[
                          {id:"g-ft-1b1", type:"static", text:"National agencies – Department Secretaries or their equivalents"},
                          {id:"g-ft-1b2", type:"static", text:"GOCCs and GFIs attached to the OP – Heads of the GOCCs or GFIs"},
                          {id:"g-ft-1b3", type:"static", text:"GOCCs and GFIs not attached to the OP – Department Heads to which they are attached"},
                          {id:"g-ft-1b4", type:"static", text:"Provincial Governors and Mayors of highly urbanized cities or independent component cities"},
                          {id:"g-ft-1b5", type:"static", text:"Secretary of the Department of the Interior and Local Government"},
                          {id:"g-ft-1b6", type:"static", text:"State Universities and Colleges (SUCs) – Chairman of CHED for heads of SUCs and respective heads for other officials/employees"},
                          {id:"g-ft-1b7", type:"static", text:"Technical and Vocational Schools – Chairman of TESDA for heads of schools and respective heads for other officials/employees"}
                        ]
                      }
                    ]
                  },
                  {id:"g-ft-2", text:"Duly approved itinerary of travel"},
                  {id:"g-ft-3", text:"Letter of invitation of host/sponsoring country/agency/organization"},
                  {id:"g-ft-4", type:"nested", text:"Plane fare / Travel cost documents", children:[
                    {id:"g-ft-4a", type:"static", text:"Quotations of three travel agencies or its equivalent"},
                    {id:"g-ft-4b", type:"static", text:"Flight itinerary issued by the airline/ticketing office/travel agency"},
                    {id:"g-ft-4c", type:"static", text:"Official receipt for payment of plane fare"},
                    {id:"g-ft-4d", type:"static", text:"If applicable, visa and travel insurance documents"}
                  ]},
                  {id:"g-ft-5", text:"Copy of the UNDP rate for the daily subsistence allowance (DSA) for the country of destination for computation of DSA to be claimed"},
                  {id:"g-ft-6", text:"Document to show the dollar to peso exchange rate at the date of grant of cash advance"},
                  {id:"g-ft-7", text:"Where applicable, authority from the Office of the President to claim representation expenses"},
                  {id:"g-ft-8", type:"nested", text:"In case of seminars/trainings", children:[
                    {id:"g-ft-8a", type:"static", text:"Invitation addressed to the agency inviting participants (issued by the foreign country)"},
                    {id:"g-ft-8b", type:"static", text:"Acceptance of the nominees as participants (issued by the foreign country)"},
                    {id:"g-ft-8c", type:"static", text:"Programme Agenda and Logistics Information"},
                    {id:"g-ft-8d", type:"static", text:"Certification from the accountant that the previous cash advance has been liquidated and accounted for in the books"}
                  ]}
                ];

                const foreignTravelList = document.getElementById("foreign-travel-checklist");
                foreignTravelItems.forEach(item => foreignTravelList.appendChild(createNestedList(item.id, item.text, item.children)));
              </script>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <!-- Liquidation Section -->
    <div id="section-1-2" class="hidden">
      <div class="text-gray-800 leading-relaxed space-y-6">
        <h2 class="text-xl font-semibold text-blue-900">1.2 Liquidation of Cash Advances</h2>
        <div class="space-y-4">
          <h3 class="font-bold text-gray-800">General Guidelines</h3>
          <ul class="list-disc list-inside space-y-2 pl-4">
            <li><strong>Salaries, Wages, Allowances, Honoraria and Other Similar Payments</strong> – within five calendar days after the end of the pay period</li>
            <li><strong>Field Operating Expenses</strong> – within 30 calendar days after the end of the year...</li>
            <li><strong>Petty Cash Fund (PCF)</strong> – as soon as the disbursements reaches 75 percent...</li>
            <li><strong>Traveling Expenses</strong> – within 30 days after the return of the official/employee...</li>
            <li><strong>Special purpose</strong> – as soon as the purpose of the cash advance has been served.</li>
          </ul>
        </div>
        <p>Documentary requirements are similar to Granting but for liquidation, including receipts, vouchers, and supporting documents.</p>
      </div>
    </div>

  </main>

  <!-- Footer -->
  <footer class="flex justify-between items-center mt-8 pt-6 border-t border-gray-200">
    <button id="back-btn" class="hidden bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold px-6 py-2 rounded-lg shadow-md transition-all duration-200 ease-in-out">Back</button>
    <button id="next-btn" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-6 py-2 rounded-lg shadow-md transition-all duration-200 ease-in-out">Next</button>
  </footer>

</div>

<script>
  const btn11 = document.getElementById("btn-1-1");
  const btn12 = document.getElementById("btn-1-2");
  const section11 = document.getElementById("section-1-1");
  const section12 = document.getElementById("section-1-2");

  btn11.addEventListener("click", () => {
    section11.classList.remove("hidden");
    section12.classList.add("hidden");
  });

  btn12.addEventListener("click", () => {
    section11.classList.add("hidden");
    section12.classList.remove("hidden");
  });
</script>

</body>
</html>
