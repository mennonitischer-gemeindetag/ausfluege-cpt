import ServerSideRender from "@wordpress/server-side-render";
import { InspectorControls } from "@wordpress/block-editor";
import { TextControl, PanelBody } from "@wordpress/components";

export default props => {
  const {
    className,
    attributes: { character },
    setAttributes
  } = props;
  return (
    <>
      <InspectorControls>
        <PanelBody>
          <TextControl
            label="Character"
            value={character}
            onChange={character => setAttributes({ character })}
          />
        </PanelBody>
      </InspectorControls>
      <div className={className}>
        <ServerSideRender
          block="gemeindetag/ausfluege"
          attributes={{ character }}
        />
      </div>
    </>
  );
};
