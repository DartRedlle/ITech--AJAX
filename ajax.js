

function ClientStats()
{
var ajax= new XMLHttpRequest();
var username = document.getElementById('username').value;

  ajax.onload = ()=>{
    let placeholderUserStats=document.getElementById("placeholder-UserStats");
    placeholderUserStats.innerHTML='';

    let response = ajax.responseText;
    console.log(response);
    if(response==null)
    {
      return;
    } 
    let person = JSON.parse(response);
    let table = document.createElement('table');
    let tr = document.createElement('tr');
  
    let th = document.createElement('th');
    th.innerText = 'id';
    tr.appendChild(th);

    th = document.createElement('th');
    th.innerText = 'start';
    tr.appendChild(th);

    th = document.createElement('th');
    th.innerText = 'Stop';
    tr.appendChild(th);

    th = document.createElement('th');
    th.innerText = 'in_traffic';
    tr.appendChild(th);

    th = document.createElement('th');
    th.innerText = 'out_traffic';
    tr.appendChild(th);

    person.forEach(element => 
    {
      tr = document.createElement('tr');

      let td = document.createElement('td');
      td.innerText = element.ID_Seanse;
      tr.appendChild(td);

      td = document.createElement('td');
      td.innerText = element.start;
      tr.appendChild(td);

      td = document.createElement('td');
      td.innerText = element.stop;
      tr.appendChild(td);

      td = document.createElement('td');
      td.innerText = element.in_traffic;
      tr.appendChild(td);

      td = document.createElement('td');
      td.innerText = element.out_traffic;
      tr.appendChild(td);

      table.appendChild(tr);
    });
    placeholderUserStats.appendChild(table);
  }

  
  ajax.open('GET',`UserStatistic.php?username=${username}`);
  ajax.send();
}



function NetworkStats()
{
  var ajax = new XMLHttpRequest();
  var startTime = document.getElementById('startTime').value;
  var endTime = document.getElementById('endTime').value;
  
  ajax.onload = ()=>{
    let placeholderTimeIntervalStats=document.getElementById("placeholder-TimeInterval");
    placeholderTimeIntervalStats.innerHTML='';
  

    let xml = ajax.responseXML;
    console.log(ajax.responseText);
    console.dir(xml);
    
    
    if(xml == null)
      return;

    let inTraffic = xml.getElementsByTagName('inTraffic');
    let outTraffic = xml.getElementsByTagName('outTraffic');  

    let table = document.createElement('table');

    let tr = document.createElement('tr');

    let th = document.createElement('th');
    th.innerHTML = 'in traffic';
    tr.appendChild(th);

    th = document.createElement('th');
    th.innerHTML = 'out traffic';
    tr.appendChild(th);

    table.appendChild(tr);

    tr = document.createElement('tr');

    let td = document.createElement('td');
    td.innerHTML = inTraffic[0].textContent;
     tr.appendChild(td);

    td = document.createElement('td');
    td.innerHTML = outTraffic[0].textContent;
    tr.appendChild(td);

    table.appendChild(tr);

    placeholderTimeIntervalStats.appendChild(table);
    let br = document.createElement('br');
    placeholderTimeIntervalStats.appendChild(br);

    console.log(inTraffic);
    console.dir(outTraffic);
  }


  ajax.open('GET', `TimeIntervalStatistic.php?startTime=${startTime}&endTime=${endTime}`);
  ajax.send()
}



function ZeroBalance()
{
    var ajax=new XMLHttpRequest();

    ajax.onreadystatechange = function() 
    {
      if (ajax.readyState === 4)
      {
        if( ajax.status === 200) 
          {
            
			      document.getElementById('placeholder-zeroBalance').innerHTML = ajax.responseText;
          }
        else alert(ajax.status + " - " + ajax.statusText);
        ajax.abort();  
      }
    };
    
    ajax.open('GET', "ZeroBalanceUsers.php");
    ajax.send(null);
}