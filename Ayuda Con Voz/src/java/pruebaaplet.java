/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
public class pruebaaplet extends JApplet {

      Panel nuevo=new Panel();
         Button boton1=new Button("Calcular");
         Button boton2=new Button("Calcular 2");
    public void init() {
        setLayout(new BorderLayout());
         nuevo.add(boton1);
         nuevo.add(boton2);
         add(nuevo,"North");
      
    }
  public void paint(Graphics g)
        {
         int xpuntos[] ={150,200,150};
         int ypuntos[] ={300,350,350};
         g.drawString("Hola mundo", 120, 90);
         g.drawLine(120,100,200,100);
         g.setColor(Color.red);
         g.fillOval(150,150,40,40);
         g.setColor(Color.GREEN);
         g.fillRect(200,150, 40, 40);
         g.drawPolygon(xpuntos, ypuntos,3);
                 
        }
  public boolean action(Event e,Object o)
  {
      if(e.target==boton1)
      {
          repaint();
      }
      return true;
  }
}
