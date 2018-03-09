import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-dbaudio',
  templateUrl: './dbaudio.component.html',
  styleUrls: ['./dbaudio.component.css']
})
export class DbaudioComponent implements OnInit {

  mailToTangara: string = "mailto:opec@rbvradios.com.br?Subject=Gravar%Audio";

  constructor() { }

  ngOnInit() {
  }

}
