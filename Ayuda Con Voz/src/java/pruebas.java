/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.applet.Applet;
import java.awt.BorderLayout;
import java.awt.Button;
import java.awt.Color;
import java.awt.Event;
import java.awt.Graphics;
import java.awt.Panel;
import javax.swing.JApplet;

/**
 *
 * @author Chris
 */
public class pruebas extends Applet {

      Panel nuevo=new Panel();
      Button boton1=new Button("lapiz");
      Button boton2=new Button("borrador");
      int a,d;
      boolean bandera=true;
      String ordena;
    public void init() {
        add(boton1);
        add(boton2);
      
    }
  public void paint(Graphics g)
        {
           
            if(!bandera && ordena=="Grafica"){
                
         g.setColor(Color.red);
         g.fillOval(a,d,40,40);
            }
        if(!bandera && ordena=="Borrar"){
                
         g.setColor(Color.white);
         g.fillOval(a,d,40,40);
            }
                 
        }
  public void update(Graphics g)
  {
      paint(g);
  }
  public boolean mouseDrag(Event e,int x,int y)
  {
       bandera=false;
      a=x;
      d=y;
      repaint();
      return true;
  }
  public boolean action(Event e,Object o)
  {
      if(e.target==boton1)
      {
         ordena="Grafica";
      }
           if(e.target==boton2)
      {
         ordena="Borrar";
      }
      return true;
  }
}
