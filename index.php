<?php get_header(); ?>

<?php
$args = array('post_type' => 'page', 'pagename' => 'home');
$my_page = get_posts($args);
?>

<main>
  <div class="container height-100 ">
    <div class="row justify-content-center height-100 align-items-center">
      <div class="col-md-6">
        <div class="principal-box">
          <h1>
            <a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>">
              <?php if ($my_page) : foreach ($my_page as $post) : setup_postdata($post); ?>
                  <?php the_title(); ?>
                <?php endforeach; ?>
              <?php else : ?>
                [TÍTULO PRINCIPAL]
              <?php endif; ?>
            </a>
          </h1>
          <p>
            I was tired of seeing my web pages slow when I used animations and motions. But now, I cut off unnecessary tags, scripts and am creating a clean code.
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <canvas class="webgl2"></canvas>
      </div>
    </div>
  </div>
</main>
<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 align-txts">
        <?php if ($my_page) : foreach ($my_page as $post) : setup_postdata($post); ?>
            <?php the_content() ?>

          <?php endforeach; ?>
        <?php else : ?>
          <p style="text-align: center;">[AQUI FICARÁ UM TEXTO]</p>
        <?php endif; ?>
      </div>
      <div class="col-md-6">
        <div class="glashhmorph">
          <img src="wp-content/themes/edustadlertheme/assets/image/themeedu.png" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<section class="p-100 center-content">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2>Dynamic Pages</h2>
        <div class="glashhmorph">
          <img src="wp-content/themes/edustadlertheme/assets/image/headless.PNG" alt="">
        </div>
      </div>

    </div>
  </div>
</section>









<script type="module">
  //Debug

  const canvas = document.querySelector('canvas.webgl2')
  //scene
  const scene = new THREE.Scene()

  //Objeto

  const geometria5 = new THREE.TorusGeometry(.7, .2, 32, 100);

  const geometria6 = new THREE.CylinderGeometry(.3, .3, .9, 64);

  //Material

  const material5 = new THREE.MeshStandardMaterial({
    roughness: .4,
    metalness: .5
  })

  const material6 = new THREE.MeshStandardMaterial({
    roughness: .6,
    metalness: .2
  })

  material5.color = new THREE.Color(0x000000)
  material6.color = new THREE.Color(0x000000)


  //Mesh

  const planeta4 = new THREE.Mesh(geometria5, material5)
  planeta4.position.y = -.5
  planeta4.position.z = -3

  scene.add(planeta4)

  const planeta3 = new THREE.Mesh(geometria6, material6)
  planeta3.position.x = .5
  planeta3.position.y = .2

  scene.add(planeta3)



  //luzes

  const luz5 = new THREE.PointLight(0xFFE900, 4)
  luz5.position.x = 2
  luz5.position.y = 3
  luz5.position.z = 4

  scene.add(luz5)

  const luz6 = new THREE.PointLight(0xFFFFFF, 0.8)
  luz6.position.x = -8
  luz6.position.y = -3
  luz6.position.z = 4

  scene.add(luz6)

  const renderer = new THREE.WebGLRenderer({
    canvas: canvas,
    alpha: true,
    antialias: true
  })
  //sizes

  const sizes = {
    width: window.innerWidth,
    height: window.innerHeight
  }

  window.addEventListener('resize', () => {
    // Update sizes
    sizes.width = window.innerWidth
    sizes.height = window.innerHeight

    // Update camera
    camera.aspect = sizes.width / sizes.height
    camera.updateProjectionMatrix()

    // Update renderer
    renderer.setSize(sizes.width, sizes.height)
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))
  })

  //camera

  const camera = new THREE.PerspectiveCamera(90, sizes.width / sizes.height, 0.1, 50)
  camera.position.x = 0
  camera.position.y = 0
  camera.position.z = 2
  scene.add(camera)


  renderer.setSize(sizes.width, sizes.height)
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))

  const clock1 = new THREE.Clock()

  const tick1 = () => {

    const elapsedTime1 = clock1.getElapsedTime()

    // Update objects
    planeta4.rotation.y = .5 * elapsedTime1
    planeta3.rotation.z = .5 * elapsedTime1

    // Update Orbital Controls
    // controls.update()

    // Render
    renderer.render(scene, camera)

    // Call tick again on the next frame
    window.requestAnimationFrame(tick1)
  }

  tick1()

  gsap.registerPlugin(CSSRulePlugin)
  gsap.registerPlugin(ScrollTrigger)




  const st = gsap.timeline({
    scrollTrigger: {
      trigger: "#first",
      markers: false,
      start: "top top",
      //endTrigger: "#second",
      end: "center bottom",
      scrub: true,
      //opacity: 0,

      ease: Expo.easeIn
    }
  });



  gsap.to(".webgl", 2, {
    opacity: 1,
    delay: .2,
    ease: Expo.easeIn
  });



  const canvas1 = document.querySelector('canvas.webgl')


  //scene
  const scene1 = new THREE.Scene()




  //textura

  const textureloader = new THREE.TextureLoader()

  const normaltexture = textureloader.load('wp-content/themes/edustadlertheme/assets/image/grillnormal.jpg')

  const metaltexture = textureloader.load('wp-content/themes/edustadlertheme/assets/image/grillmetal.jpg')

  const rougtexture = textureloader.load('wp-content/themes/edustadlertheme/assets/image/grillroug.jpg')

  const heighttexture = textureloader.load('wp-content/themes/edustadlertheme/assets/image/grillheight.png')

  const ambienttexture = textureloader.load('wp-content/themes/edustadlertheme/assets/image/grillambient.jpg')

  const basettexture = textureloader.load('wp-content/themes/edustadlertheme/assets/image/grillbase.jpg')

  const Rendertexture = new THREE.WebGLRenderTarget(64, {
    format: THREE.RGBFormat,
    generateMipmaps: true,
    minFilter: THREE.LinearMipmapLinearFilter,
    encoding: THREE.sRGBEncoding
  })

  //Objeto



  const planetageometria = new THREE.SphereGeometry(.5, 150, 150)

  //Material

  const material1 = new THREE.MeshStandardMaterial({
    roughness: 1.5,
    metalness: 1.4,
    map: basettexture,
    //wireframe: true,
    aoMap: ambienttexture,
    metalnessMap: metaltexture,
    displacementMap: heighttexture,
    displacementScale: -0.09,
    roughnessMap: rougtexture,
    normalMap: normaltexture,
    envMap: Rendertexture.texture

  })

  material1.color = new THREE.Color(0xFFE900, .2)


  //Mesh

  const planeta = new THREE.Mesh(planetageometria, material1)

  planeta.geometry.attributes.uv2 = planeta.geometry.attributes.uv
  planeta.position.y = .5
  scene1.add(planeta)

  //luzes

  const ambient = new THREE.AmbientLight(0x6d9ae3, 20)
  scene1.add(ambient)

  const luz1 = new THREE.PointLight(0xffffff, 6)
  luz1.position.x = 2
  luz1.position.y = 3
  luz1.position.z = 4

  scene1.add(luz1)

  const luz2 = new THREE.PointLight(0x1500d1, 20)
  //luz2.position.x = -8
  //luz2.position.y = -3
  //luz2.position.z = 4

  luz2.position.set(-1.5, 1.5, 1)
  luz2.intensity = 2

  scene1.add(luz2)


  //sizes

  const sizes1 = {
    width: window.innerWidth,
    height: window.innerHeight
  }

  window.addEventListener('resize', () => {
    // Update sizes
    sizes1.width = window.innerWidth
    sizes1.height = window.innerHeight

    // Update camera
    camera1.aspect = sizes1.width / sizes1.height
    camera1.updateProjectionMatrix()

    // Update renderer
    renderer1.setSize(sizes1.width, sizes1.height)
    renderer1.setPixelRatio(Math.min(window.devicePixelRatio, 2))
  })

  //camera

  const camera1 = new THREE.PerspectiveCamera(75, sizes1.width / sizes1.height, 0.1, 100)
  camera1.position.x = 0
  camera1.position.y = 0
  camera1.position.z = 2
  scene1.add(camera1)

  const renderer1 = new THREE.WebGLRenderer({
    antialias: true,
    canvas: canvas1,
    alpha: true
  })

  renderer1.setSize(sizes1.width, sizes1.height)
  renderer1.setPixelRatio(Math.min(window.devicePixelRatio, 2))


  document.addEventListener('mousemove', onMouseMove)

  let mouseX = 0;
  let mouseY = 0;

  let targetX = 0;
  let targetY = 0;

  const windowX = window.innerWidth / 2;
  const windowY = window.innerHeight / 2;

  function onMouseMove(event) {
    mouseX = (event.clientX - windowX)
    mouseY = (event.clientY - windowY)
  }

  const clock = new THREE.Clock()

  const tick = () => {
    targetX = mouseX * .0015
    targetY = mouseY * .0015

    const elapsedTime = clock.getElapsedTime()

    // Update objects
    planeta.rotation.y = .3 * elapsedTime
    planeta.rotation.x = .2 * elapsedTime
    planeta.rotation.x += .3 * (targetX - planeta.rotation.x / 10)
    planeta.rotation.y += .3 * (targetY - planeta.rotation.y / 10)



    // Render
    renderer1.render(scene1, camera1)

    // Call tick again on the next frame
    window.requestAnimationFrame(tick)
  }

  tick();
</script>

<?php get_footer(); ?>