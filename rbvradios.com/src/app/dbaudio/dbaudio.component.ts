import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-dbaudio',
  templateUrl: './dbaudio.component.html',
  styleUrls: ['./dbaudio.component.css']
})
export class DbaudioComponent implements OnInit {

  mail: string = "mailto:opec@rbvradios.com.br?Subject=Gravar%AudioNew";

  horario: string = "15:00 às 18:00";

  

  constructor() { }

  ngOnInit() {
  }

}
