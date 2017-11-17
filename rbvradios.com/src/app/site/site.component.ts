import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-site',
  templateUrl: './site.component.html',
  styleUrls: ['./site.component.css']
})
export class SiteComponent implements OnInit {


  msg: any = {
    nome: 'abc',
    email: 'mail@mail.com'
  }




  constructor() { }

  ngOnInit() {
  }

}
