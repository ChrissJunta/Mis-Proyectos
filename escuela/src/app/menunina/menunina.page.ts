import { Component, OnInit } from '@angular/core';
import { VideoPlayer, VideoOptions } from '@ionic-native/video-player/ngx';
@Component({
  selector: 'app-menunina',
  templateUrl: './menunina.page.html',
  styleUrls: ['./menunina.page.scss'],
})
export class MenuninaPage implements OnInit {
  options: VideoOptions
  constructor(private videoPlayer: VideoPlayer) {
    this.options = {
      scalingMode: 0,
      volume: 0.5
    };
   }
    
   playLocalVideo() {
    // Playing a video.
    this.videoPlayer.play('http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4').then(() => {
      console.log('video completed');
    }).catch(err => {
      alert(err);
    });
  }
  ngOnInit() {
  }

  
}
